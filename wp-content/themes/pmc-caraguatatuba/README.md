# PMC Caraguatatuba — Block Theme

Tema WordPress Block Theme nativo do portal institucional da Prefeitura Municipal de
Caraguatatuba. Esta versão entrega o **header em três faixas** e o **hero de destaques**.

- **Versão:** 1.0.0
- **Requer:** WordPress 6.5+, PHP 8.0+
- **Design tokens:** `theme.json` (Design System STII) — fonte oficial e única

---

## Estrutura

```
pmc-caraguatatuba/
├── style.css                      identificação do tema (sem regras de estilo)
├── theme.json                     ← FONTE OFICIAL DOS DESIGN TOKENS
├── functions.php                  suportes, enfileiramento, categoria de padrões
├── screenshot.png                 miniatura em Aparência → Temas
│
├── templates/
│   ├── front-page.html            header + hero
│   ├── index.html                 listagem
│   ├── page.html   single.html
│   ├── search.html 404.html
│
├── parts/
│   ├── header.html                ← UM único <header>, composto por 3 faixas
│   └── footer.html
│
├── patterns/
│   ├── header-utility.php         faixa 1 — links institucionais e portais
│   ├── header-main.php            faixa 2 — marca, busca e navegação
│   ├── header-brand.php           componente: brasão + nome do município
│   ├── header-search.php          componente: busca com seletor de escopo
│   ├── events-ticker.php          faixa 3 — EVENTOS
│   ├── hero.php                   banner de destaques (3 slides)
│   └── header-hero.php            conjunto header + hero para novos templates
│
└── assets/
    ├── css/portal.css             CSS estrutural (sem tokens próprios)
    ├── js/portal.js               carrossel do hero
    ├── img/                       ⚠ imagens PROVISÓRIAS — ver assets/img/README.md
    └── fonts/                     ⚠ fontes ausentes — ver assets/fonts/README.md
```

### Por que o header é uma template part e as faixas são patterns

O elemento `<header>` é emitido **uma única vez**, pelo bloco `core/template-part`
com `area: header`. Por isso o invólucro dentro de `parts/header.html` é uma `<div>`:
se fosse `<header>`, o resultado seria `<header>` dentro de `<header>`.

As três faixas são patterns PHP, e não parts, por dois motivos:

1. um arquivo `.html` de template part não executa PHP e, portanto, não resolve
   `home_url()`, escape nem tradução — necessários em links, formulário de busca e
   rótulos;
2. pela regra 6 do projeto, `patterns/` é o lugar de seções e componentes
   reutilizáveis; `parts/` é o lugar de regiões do tema (header, footer).

---

## Header

### Faixa 1 — utilidades (`header-utility.php`)

Fundo `primary-900`. À esquerda os links institucionais, à direita os portais,
separados por `|`. Tipografia Montserrat 12 px, caixa alta, `letter-spacing .08em`.

### Faixa 2 — principal (`header-main.php`)

Fundo branco. Três blocos em linha: marca, busca e navegação.

**Busca.** O bloco `core/search` não tem seletor de escopo. Como o Design System
prevê "Esta página / Todo o site" como controle **funcional**, a busca é um
formulário próprio dentro de um bloco `core/html` — e não uma decoração sobreposta
ao bloco nativo. O escopo chega no parâmetro `escopo`; para fazê-lo agir, trate-o
em `pre_get_posts`:

```php
add_action( 'pre_get_posts', function ( $query ) {
	if ( ! $query->is_search() || ! $query->is_main_query() || is_admin() ) {
		return;
	}

	if ( isset( $_GET['escopo'] ) && 'pagina' === $_GET['escopo'] ) {
		// restrinja aqui o post_type / post_parent conforme a regra do portal
	}
} );
```

**Navegação.** Bloco `core/navigation` nativo, com os cinco itens padrão já na
marcação — assim o menu renderiza mesmo antes de um menu ser cadastrado. Para
gerenciá-lo pelo Site Editor: **Aparência → Editor → Navegação**.

O menu sobreposto do `core/navigation` troca em 600 px por padrão; o portal precisa
dele até 1280 px, onde a navegação horizontal deixa de caber. Três regras em
`portal.css` (seção 3) estendem esse comportamento.

### Faixa 3 — eventos (`events-ticker.php`)

Gradiente `ticker-gradient`, rótulo EVENTOS em `secondary-600` e lista horizontal
rolável. O conteúdo está no array `$pmc_eventos` no topo do arquivo, isolado
justamente para que a troca por uma consulta (CPT `evento`) não exija tocar na
marcação.

---

## Hero

Cinco camadas sobrepostas:

| z | Camada | Origem |
|---|---|---|
| 1 | `.pmc-hero__strip` — faixa fotográfica no topo | CSS, decorativa |
| — | arte de fundo | CSS, no próprio `.pmc-hero` |
| 2 | `.pmc-hero__veil` — véu azul da esquerda | CSS, decorativa |
| 3 | `.pmc-hero__slide` — tag, título, texto e CTA | **blocos nativos, editáveis** |
| 4 | `.pmc-hero__dots` — controles do carrossel | `core/html` |

As camadas decorativas vêm de CSS porque os caminhos das imagens ficam
centralizados em três variáveis no topo do `portal.css` — trocar as artes não exige
tocar em nenhum outro arquivo.

O primeiro destaque usa `<h1>`; os demais usam `<h2>` com a mesma classe, para não
haver mais de um `<h1>` no documento.

**Carrossel** (`assets/js/portal.js`): autoplay de 6 s, pausa no hover, no foco de
teclado e quando a aba perde visibilidade; desligado sob
`prefers-reduced-motion: reduce`.

---

## Regras que este tema segue

1. `theme.json` é a fonte oficial dos tokens — **não foi alterado**.
2. Nenhum token novo de cor, fonte, tamanho, espaçamento, raio ou sombra foi criado.
3. `portal.css` não contém **nenhuma cor literal**. As poucas transparências que a
   paleta não expressa (véu do hero, divisores sobre azul) são derivadas dos próprios
   tokens com `color-mix()`, com fallback declarado antes para navegadores antigos.
4. Medidas sem token equivalente — `min-height` do hero, 52/56 px do brasão, 10 px
   dos dots — usam px diretamente e estão comentadas. Alturas compostas usam
   `calc()` sobre os presets (ex.: faixa do hero = `layout-8x × 2` = 128 px).

Validação executada nesta entrega: nenhuma referência a token inexistente em
`portal.css` nem nos atributos de bloco, e nenhum `#hex` no CSS.

---

## Pendências conhecidas

1. **Imagens provisórias** — `assets/img/README.md` explica como substituir.
2. **Fontes ausentes** — `assets/fonts/README.md` explica como obter Montserrat e
   Inter. Até lá o tema usa o fallback `Segoe UI` declarado no `theme.json`.
3. **Conteúdo estático** — eventos e slides do hero estão em arrays PHP; a troca por
   CPT é o próximo passo.
4. **Escopo da busca** — o seletor envia `escopo`, mas ainda não filtra: falta a
   regra em `pre_get_posts` (modelo acima).
5. **Tamanho do título do hero** — o token `hero` do `theme.json` limita em
   `clamp(1.75rem, 3vw, 2.75rem)` = 44 px. O protótipo Lovable usa 58 px. Mantido o
   token; ajustar exige decisão sobre o Design System.

---

## Como validar no WordPress Studio

1. Copie a pasta para `wp-content/themes/` e ative em **Aparência → Temas**.
2. Abra a home em **1600 px** e compare com a referência visual.
3. Repita em **1280, 1024, 768 e 430 px** — não deve haver rolagem horizontal.
   (Verificado nesta entrega nos quatro tamanhos.)
4. **Hero:** confirme que os dots trocam os três destaques, que o autoplay pausa no
   hover e que para com `prefers-reduced-motion: reduce`.
5. **Teclado:** navegue com Tab pelo header inteiro; o foco deve mostrar contorno
   amarelo (`border-focus`) em links, botões, `select` e campo de busca.
6. **Site Editor → Padrões → Portal Caraguatatuba:** confirme que "Cabeçalho do
   Portal + Hero" insere um único `<header>` (inspecione o HTML).
7. **Busca:** envie o formulário e confirme que a URL traz `?escopo=…&s=…`.
