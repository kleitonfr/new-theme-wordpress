# PMC Caraguatatuba — Arquitetura e fluxo de edição

## Objetivo

Este documento explica onde alterar o Block Theme `pmc-caraguatatuba` e qual arquivo controla cada parte do front-end. A regra principal é: **theme.json é a fonte dos tokens e das configurações globais; templates/parts/patterns definem estrutura; portal.css fica apenas para comportamento visual/estrutural que não é adequado ao theme.json.**

## Fluxo mental

```text
theme.json
  ↓
tokens, tipografia, cores, espaçamento, sombras, layout
  ↓
templates/*.html
  ↓
composição das páginas
  ↓
parts/*.html
  ↓
regiões reutilizáveis como header/footer
  ↓
patterns/*.php
  ↓
componentes/seções reutilizáveis
  ↓
assets/css/portal.css
  ↓
apenas exceções estruturais/visuais
```

## Onde alterar para ver o efeito no front-end

| O que você quer mudar | Arquivo principal | Efeito |
|---|---|---|
| Cor institucional | `theme.json` → `settings.color.palette` | Disponível como preset no editor e nas variáveis `--wp--preset--color--*` |
| Cor padrão da página | `theme.json` → `styles.color` | Corpo do site |
| Fonte global | `theme.json` → `styles.typography` | Todo o site |
| Fontes disponíveis | `theme.json` → `settings.typography.fontFamilies` | Editor + presets |
| Tamanhos de fonte | `theme.json` → `fontSizes` | Editor + classes/presets |
| Espaçamentos | `theme.json` → `spacing.spacingSizes` | Editor + `var:preset|spacing|...` |
| Sombras | `theme.json` → `shadow.presets` | Presets + variáveis |
| Raio de borda reutilizável | `theme.json` → `custom.radius` | Variáveis `--wp--custom--radius--*` |
| Header inteiro | `parts/header.html` | Header global |
| Barra superior | `parts/header-utility.html` | Utility bar |
| Logo/identidade | `parts/header-brand.html` | Marca dentro do header principal |
| Busca/navegação/header principal | `parts/header-main.html` | Região principal do header |
| Eventos | `parts/events-ticker.html` | Faixa de eventos |
| Footer | `parts/footer.html` | Rodapé global |
| Hero | `patterns/hero.php` | Hero da Home |
| Portais/serviços | `patterns/portal-section.php` | Seção de portal + cards |
| Card de serviço | `patterns/service-card.php` | Cada card |
| Notícias | `patterns/news-section.php` | Query e cards de notícias |
| Ordem da Home | `templates/front-page.html` | Header → Hero → seções → Footer |
| Página de notícia | `templates/single.html` | Estrutura de posts individuais |
| Layout/responsividade excepcional | `assets/css/portal.css` | CSS complementar |

## Regra para decidir onde fazer uma alteração

### 1. É um token de design?

Exemplos: `16px`, `24px`, `#007BBB`, fonte, raio, sombra.

**Primeiro procure no `theme.json`.** Não repita o valor no template.

### 2. É uma configuração nativa de bloco?

Exemplos: Group constrained/flex, alinhamento, tamanho de fonte, cor, padding, margin.

Use os atributos do bloco e, quando o valor existir como preset, use o preset:

```html
"fontSize":"18"
```

ou:

```html
"textColor":"text-secondary"
```

ou:

```html
"style": {
  "spacing": {
    "padding": {
      "top": "var:preset|spacing|layout-3x"
    }
  }
}
```

### 3. É uma regra visual específica que o WordPress não expressa bem pelo sistema de blocos?

Use `assets/css/portal.css`.

Exemplos atuais: grid específico da galeria, `aspect-ratio`, dimensões específicas do hero, tratamento de estados da busca/navegação e media queries.

## Por que os arquivos foram quebrados

`parts/header.html` agora funciona como um compositor. Ele não precisa conhecer os detalhes internos de cada região. A marca foi separada para `parts/header-brand.html`, enquanto `header-main.html` mantém busca e navegação.

Isso significa que, para alterar somente a identidade visual do header, você não precisa editar o arquivo inteiro do header.

## Como uma alteração percorre o sistema

Exemplo: mudar o espaçamento padrão de 24px.

1. Abra `theme.json`.
2. Localize `settings.spacing.spacingSizes`.
3. Altere o preset correspondente.
4. Componentes que usam `var:preset|spacing|...` passam a consumir o novo valor.
5. Não altere individualmente todos os patterns.

Exemplo: mudar apenas o padding do card de serviço.

1. Abra `patterns/service-card.php`.
2. Localize o Group `.pmc-service-card`.
3. Altere o preset de spacing usado naquele bloco.
4. O efeito aparece nos cards que usam esse pattern.

Exemplo: mudar o header.

1. Estrutura geral: `parts/header.html`.
2. Barra superior: `parts/header-utility.html`.
3. Marca: `parts/header-brand.html`.
4. Busca e navegação: `parts/header-main.html`.
5. Cores/fontes/espaçamento globais: `theme.json`.
6. Comportamentos que não cabem no sistema de blocos: `assets/css/portal.css`.

## Observação sobre CSS

O CSS atual já consome várias variáveis `--wp--preset--*`, o que é positivo. A próxima evolução deve ser reduzir valores literais restantes quando houver um preset equivalente no `theme.json`, mas sem transformar `theme.json` em um depósito de regras específicas de componentes.

## Validação

Depois de editar:

1. Salve o arquivo.
2. Recarregue o front-end.
3. Se a alteração foi em `theme.json`, verifique também o Site Editor.
4. Se a alteração foi em um pattern, confirme a página que o chama — na Home, `templates/front-page.html` referencia os patterns.
5. Limpe cache, se houver cache de página/opcache/CDN.

## Estado desta refatoração

A refatoração foi realizada em uma branch separada para evitar alteração direta da `main` antes da validação visual. O foco desta etapa foi melhorar a legibilidade dos arquivos e aumentar o uso de presets do `theme.json`, sem tentar mover para `theme.json` regras que são claramente específicas de componente.
