# Tema PMC Caraguatatuba

Block Theme (FSE) do Portal da Prefeitura Municipal de Caraguatatuba, baseado no
Design System STII e no layout "Portal Prefeitura" do Figma.

> Para **onde alterar cada coisa**, leia `README-THEME-ARCHITECTURE.md`.
> Para o **histórico da implementação do design**, leia `README-DESIGN-IMPLEMENTATION.md`.

## Estrutura

```
pmc-caraguatatuba/
├── style.css                       → metadados obrigatórios do tema
├── theme.json                      → design tokens (fonte oficial) + fontFace
├── functions.php                   → theme supports + enqueue de CSS/JS
├── templates/
│   ├── front-page.html             → Home: header → hero → seções → footer
│   ├── index.html                  → fallback
│   └── single.html                 → notícia/artigo
├── parts/
│   ├── header.html                 → compositor: utility + main + eventos
│   ├── header-utility.html         → barra institucional superior
│   ├── header-main.html            → marca, busca e navegação
│   ├── header-brand.html           → brasão + identidade
│   ├── events-ticker.html          → faixa de eventos
│   └── footer.html                 → rodapé
├── patterns/
│   ├── header-hero.php             → cabeçalho completo (registro no inserter)
│   ├── hero.php                    → carrossel de destaques
│   ├── portal-section.php          → portais Cidadão/Empreendedor/Servidor
│   ├── service-card.php            → card de serviço
│   ├── news-section.php            → notícias (core/query)
│   ├── media-section.php           → vídeos e galeria
│   └── government-section.php      → governo municipal
└── assets/
    ├── css/portal.css              → exceções estruturais/visuais (carregado)
    ├── css/header.css              → LEGADO, não carregado — ver aviso abaixo
    ├── js/portal.js                → carrossel do hero (carregado)
    ├── js/header.js                → LEGADO, não carregado — ver aviso abaixo
    ├── fonts/                      → Montserrat e Inter (ver fonts/README.md)
    └── img/                        → brasão e peças do hero
```

## Estrutura do cabeçalho

`parts/header.html` é apenas um compositor e emite **um único `<header>`**:

```
header.html
  ├── header-utility.html   → barra institucional (links + portais)
  ├── header-main.html      → marca + busca + navegação
  │     └── header-brand.html
  └── events-ticker.html    → faixa de eventos
```

Não existem cabeçalhos alternativos. Para alterar uma região, edite o part
correspondente — não duplique o header.

## Hero

`patterns/hero.php` é um carrossel de destaques em modelo **híbrido**:

- a peça gráfica aparece **inteira**, sem corte e **sem texto sobreposto**
  (as artes já trazem título, botão e brasão embutidos);
- o título, a descrição e o CTA editáveis do WordPress ficam na **faixa abaixo**
  da imagem;
- `assets/js/portal.js` controla a troca de slides (autoplay 6 s, pausa no hover
  e no foco, respeita `prefers-reduced-motion`).

As imagens vivem em `assets/img/` e são referenciadas via `get_theme_file_uri()`.

## ⚠️ Arquivos legados

`assets/css/header.css` e `assets/js/header.js` são de uma etapa anterior,
**não são carregados** pelo `functions.php` e referenciam tokens que não existem
mais no `theme.json` (`navy-900`, `blue-700`, `surface-100`, `font-size--xs`).
Mantidos apenas como referência histórica. **Não adicione estilos neles** e não
os enfileire — o `header.js` implementa um carrossel concorrente ao do
`portal.js` e os dois juntos causariam conflito.

## Instalação

1. Copie a pasta `pmc-caraguatatuba/` para `wp-content/themes/`.
2. Ative o tema em **Aparência → Temas**.
3. Adicione as fontes em `assets/fonts/` (veja `assets/fonts/README.md`).
4. Em **Aparência → Personalizar → Identidade do Site**, envie
   `assets/img/brasao.jpg` como logotipo e defina o título "Caraguatatuba".
5. Em **Aparência → Editor → Navegação**, crie o menu principal
   (Início, Notícias, Serviços, Galeria, Unidades).

## Pendências conhecidas

- **Resolução das peças do hero**: as artes atuais têm 719–825 px de largura.
  O CSS limita a exibição a 1040 px para não borrar; para ocupar toda a largura
  do container (1440 px) com nitidez, reexporte a ≥ 1650 px.
- **Escopo da busca**: o seletor "Esta página / Todo o site" do layout não existe
  no bloco `core/search` e não foi implementado.
- **Conteúdo dinâmico**: eventos, slides do hero, serviços e links de secretarias
  ainda são estáticos e devem vir de uma fonte administrável.
