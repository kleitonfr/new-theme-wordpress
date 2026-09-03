# Tema PMC Caraguatatuba — Header + Banner

Block theme (FSE) reproduzindo o frame **header+banner** do Figma
["Portal Prefeitura"](https://www.figma.com/design/XA0hP5BCCgJSF4PyjYvgoJ/Portal-Prefeitura?node-id=0-1).
Este pacote cobre **apenas** essa seção — o restante do site (home,
notícias, footer etc.) ainda não foi construído.

## Estrutura

```
pmc-caraguatatuba/
├── style.css              → metadados obrigatórios do tema
├── theme.json              → paleta, gradientes, tipografia (design tokens do Figma)
├── functions.php           → theme supports + enqueue de assets/css/js
├── templates/
│   └── front-page.html     → chama o template part "header"
├── parts/
│   └── header.html         → header+banner completo, em blocos nativos
├── patterns/
│   └── header-hero.php     → o mesmo header registrado como pattern no inserter
└── assets/
    ├── css/header.css      → o que os blocos nativos não resolvem sozinhos
    ├── js/header.js        → carrossel do hero (autoplay + dots), sem dependências
    ├── fonts/              → (vazio) — colocar Montserrat aqui, ver nota abaixo
    └── img/                → (vazio) — colocar as imagens do banner aqui
```

## Correspondência com o Figma

| Seção Figma | Implementação |
|---|---|
| Barra topo (`Rectangle 7`, `#0a2d6e`) | `.caragua-utility-bar` |
| Header principal (logo, busca, menu) | `wp:site-logo` + `wp:site-title/tagline` + `wp:search` + `wp:navigation` |
| Ticker de eventos (gradiente `#0e367c → #2c6bc5`) | `.caragua-ticker` (estático por ora — ver "Próximos passos") |
| Banner hero (overlay + SEMAAP + CTA + dots) | `wp:cover` + `.caragua-hero__dots` + `assets/js/header.js` |

Cores e gradientes foram extraídos direto dos nós do Figma e viraram
tokens em `theme.json` (`navy-900`, `blue-700`/`blue-500`,
`ticker-gradient`, `hero-overlay` etc.) — evite hardcodar cor nova
fora daí.

## Pendências / decisões que precisam da sua validação

1. **Fonte Montserrat**: o design usa `Montserrat ExtraBold` no menu
   ativo. `theme.json` já aponta para
   `assets/fonts/Montserrat-VariableFont_wght.ttf`, mas o arquivo
   da fonte **não foi incluído** (baixe do Google Fonts e coloque
   nessa pasta, ou troque por `wp_enqueue_style` do Google Fonts se
   preferir não hospedar local).
2. **Imagens**: o logo (`wp:site-logo`, configurável em
   Aparência → Personalizar) e a imagem de fundo do hero
   (`assets/img/hero-slide-1.jpg`, referenciada em `parts/header.html`)
   precisam ser exportadas do Figma e adicionadas — os links de asset
   que a API do Figma me devolveu expiram em 7 dias, então não dá
   pra depender deles em produção.
3. **Ticker e carrossel são estáticos**: os dois eventos e o slide
   único do hero estão hardcoded em `parts/header.html`. Pra virar
   dinâmico (ex.: puxar de um CPT "eventos" ou de vários slides),
   dá pra migrar pra `wp:query` + template de CPT — fica fácil de
   fazer depois, mas decidi não assumir isso sem confirmar com você.
4. **Ícones** (lupa da busca, sino do ticker): usei um emoji (🔔)
   como placeholder no ticker; o ícone de busca já vem do bloco
   nativo `wp:search`. Se quiser os SVGs exatos do Figma, dá pra
   exportar e trocar depois.

## Como testar

1. Copie a pasta `pmc-caraguatatuba/` para `wp-content/themes/`.
2. Ative o tema em **Aparência → Temas**.
3. Configure o logo em **Aparência → Personalizar → Identidade do
   Site** (ou direto no Site Editor).
4. Abra o **Site Editor** (Aparência → Editor) pra ver/editar o
   header visualmente — todo o conteúdo estático virou blocos
   editáveis (parágrafos, navegação, cover), exceto os dots do
   carrossel, que ficaram em HTML puro por precisarem de `data-*`
   específicos pro JS.
