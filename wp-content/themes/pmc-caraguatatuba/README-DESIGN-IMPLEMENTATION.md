# PMC Caraguatatuba — Implementação do Design System e do Figma

## Objetivo

Este documento registra a adaptação do tema `pmc-caraguatatuba` para a nova estética do Portal Oficial da Prefeitura, tomando como referências:

1. o Design System STII existente no repositório `kleitonfr/design-system-stii`;
2. o protótipo do Portal Prefeitura no Figma;
3. a arquitetura de Block Theme/FSE já existente no tema.

## Escopo desta etapa

A implementação prioriza a fundação visual e arquitetural necessária para que o tema reproduza o layout do Figma sem transformar a Home em HTML estático. Os tokens ficam centralizados no `theme.json`, enquanto estruturas reutilizáveis ficam em template parts e patterns.

## Arquivos alterados

### `theme.json`

Foi alinhado ao Design System STII:

- paleta semântica para backgrounds, textos, ações, bordas e feedback;
- tipografia Montserrat, Inter e JetBrains Mono;
- escala tipográfica baseada no DS;
- escala de espaçamento baseada no sistema de 4/8 px;
- raios e elevação;
- foco acessível;
- configurações de layout e largura compatíveis com o grid do DS;
- estilos globais para body, headings, links, botões, navegação e busca.

### `style.css`

Mantém a identificação do tema e serve como ponto de entrada para estilos complementares que não devem ser representados apenas por `theme.json`.

## Arquivos criados

### Template parts

- `parts/header-utility.html` — links institucionais da barra superior.
- `parts/header-main.html` — marca, busca e navegação principal.
- `parts/events-ticker.html` — estrutura visual da faixa de eventos.
- `parts/header.html` — composição dos três níveis do cabeçalho.
- `parts/footer.html` — composição do rodapé institucional.

### Patterns

- `patterns/hero.php` — hero principal da Home.
- `patterns/portal-section.php` — seção reutilizável de portal/serviços.
- `patterns/service-card.php` — card de serviço reutilizável.
- `patterns/news-section.php` — área editorial de notícias.
- `patterns/media-section.php` — área de vídeos e galeria.
- `patterns/government-section.php` — área de Governo Municipal.

### Templates

- `templates/front-page.html` — composição inicial da Home usando as partes/patterns.
- `templates/single.html` — estrutura editorial de notícia.

## Decisões arquiteturais

### 1. Tokens antes de CSS arbitrário

Quando um valor visual já possui correspondência no Design System, o tema deve consumir o token em vez de criar um valor local.

### 2. Conteúdo dinâmico

Notícias e conteúdo editorial devem ser consultados pelo WordPress. O Figma é tratado como referência visual, não como conteúdo hardcoded.

### 3. Reuso

Os três grandes portais — Cidadão, Empreendedor e Servidor — compartilham a mesma estrutura de seção e card. A diferenciação deve ocorrer por conteúdo/variante, não por duplicação de código.

### 4. FSE primeiro

Sempre que um bloco nativo do WordPress atende ao requisito visual, ele deve ser preferido. CSS complementar é reservado para refinamento visual e comportamentos que não são expressáveis adequadamente pelo editor.

### 5. Responsividade

A implementação deve respeitar os breakpoints e o grid do Design System STII, evitando criar uma segunda escala de breakpoints específica do tema.

## Relação com o Figma

O protótipo foi mapeado para os seguintes componentes:

| Figma | WordPress |
|---|---|
| Utility bar | `parts/header-utility.html` |
| Header principal | `parts/header-main.html` |
| Eventos | `parts/events-ticker.html` |
| Hero | `patterns/hero.php` |
| Portal do Cidadão | `patterns/portal-section.php` |
| Portal do Empreendedor | `patterns/portal-section.php` |
| Portal do Servidor | `patterns/portal-section.php` |
| Card de serviço | `patterns/service-card.php` |
| Notícias | `patterns/news-section.php` |
| Vídeos/Galeria | `patterns/media-section.php` |
| Governo Municipal | `patterns/government-section.php` |
| Artigo | `templates/single.html` |
| Rodapé | `parts/footer.html` |

## Implicações

- O Site Editor passa a ser a principal superfície para edição das estruturas FSE.
- O conteúdo real precisa ser cadastrado no WordPress para que Queries e componentes dinâmicos apresentem dados reais.
- Componentes interativos como carrosséis, ticker avançado e mosaico de galeria podem exigir JavaScript adicional em uma etapa posterior.
- Assets do Figma (logo, imagens, ícones e fontes) devem ser disponibilizados no tema ou configurados como mídia do WordPress; eles não devem ser embutidos como conteúdo fictício.

## Checklist de validação

- [ ] Conferir visualmente a Home em 1440 px contra o frame do Figma.
- [ ] Conferir tablet e mobile conforme o grid do DS.
- [ ] Validar navegação e busca no WordPress.
- [ ] Validar conteúdo dinâmico de notícias.
- [ ] Validar foco por teclado e contraste.
- [ ] Validar hero e demais componentes interativos.
- [ ] Conferir se todos os assets usados no Figma estão disponíveis.
- [ ] Revisar valores hardcoded restantes e substituir por tokens quando houver equivalência.

## Observação

Esta documentação descreve a intenção e a estrutura da implementação. A fidelidade final deve ser validada no navegador com o WordPress renderizando o tema e comparada aos frames correspondentes do Figma.
