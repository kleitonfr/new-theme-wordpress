# PMC Caraguatatuba — Implementação do Design System e do Figma

## Objetivo

Registrar as mudanças realizadas no Block Theme `pmc-caraguatatuba` para aproximá-lo do novo Portal Oficial da Prefeitura, usando como referências o Design System STII, o arquivo Portal Prefeitura no Figma e as capacidades nativas do WordPress FSE.

## O que foi realizado

### 1. Fundação visual

O `theme.json` já havia sido alinhado ao Design System antes desta etapa e permanece como fonte dos tokens: paleta semântica, Montserrat/Inter/JetBrains Mono, escala tipográfica, espaçamento 4/8 px, elevação, foco e layout de até 1440/1519 px.

Nesta etapa, os componentes passaram a consumir esses tokens em vez de repetir a paleta antiga do header.

### 2. Assets e carregamento

`functions.php` foi simplificado e atualizado para:

- usar a versão `0.2.0` do tema;
- carregar `assets/css/portal.css` no front-end e no editor;
- carregar `assets/js/portal.js` no front-end;
- manter suportes necessários ao FSE, logo, thumbnails e HTML5;
- manter a categoria de patterns `Portal Caraguatatuba`.

O antigo `assets/css/header.css` deixou de ser carregado. Ele permanece no repositório como referência legada e não deve receber novos estilos.

### 3. Header dividido em Template Parts

Foram criados:

- `parts/header-utility.html` — barra institucional superior;
- `parts/header-main.html` — logo, identidade, busca e navegação;
- `parts/events-ticker.html` — faixa de eventos;
- `parts/header.html` foi simplificado para apenas compor os três parts.

Isso reduz acoplamento e permite editar cada região no Site Editor.

### 4. Patterns reutilizáveis

Foram criados:

- `patterns/hero.php` — hero principal;
- `patterns/service-card.php` — unidade visual de serviço;
- `patterns/portal-section.php` — seção reutilizável dos portais Cidadão/Empreendedor/Servidor;
- `patterns/news-section.php` — Query dinâmica de posts;
- `patterns/media-section.php` — vídeos e mídia;
- `patterns/government-section.php` — Governo Municipal.

A intenção é reutilizar a mesma estrutura para os três portais, alterando conteúdo/variante e não duplicando componentes.

### 5. Home

`templates/front-page.html` deixou de conter o texto de teste e passou a compor Header → Hero → Portais/Serviços → Notícias → Mídia → Governo → Footer.

### 6. Conteúdo editorial

Foi criado `templates/single.html`, usando blocos dinâmicos do WordPress para categoria, título, imagem destacada, data, conteúdo e notícias relacionadas.

### 7. Footer

Foi criado `parts/footer.html` com marca, mapa do site, contatos, copyright e redes sociais, mantendo a estrutura editável pelo FSE.

### 8. CSS específico

`assets/css/portal.css` concentra somente comportamento estrutural/visual que não é conveniente expressar no `theme.json`: grid de componentes, dimensões do hero, tratamento de cards, galeria, estados do header e responsividade.

Os estilos usam variáveis `--wp--preset--*` sempre que há token correspondente.

### 9. JavaScript

`assets/js/portal.js` fornece a base do carrossel do hero com:

- navegação por indicadores;
- pausa ao passar o mouse;
- pausa ao receber foco;
- autoplay de 6 segundos;
- respeito a `prefers-reduced-motion`.

## Arquivos alterados

| Arquivo | Alteração |
|---|---|
| `functions.php` | novo carregamento de CSS/JS e editor style |
| `parts/header.html` | composição por template parts |
| `templates/front-page.html` | composição completa da Home |

## Arquivos criados

| Arquivo | Finalidade |
|---|---|
| `assets/css/portal.css` | estilos complementares do portal |
| `assets/js/portal.js` | comportamento do hero |
| `parts/header-utility.html` | barra institucional |
| `parts/header-main.html` | header principal |
| `parts/events-ticker.html` | eventos |
| `parts/footer.html` | rodapé |
| `patterns/hero.php` | hero |
| `patterns/service-card.php` | card de serviço |
| `patterns/portal-section.php` | portais e serviços |
| `patterns/news-section.php` | notícias dinâmicas |
| `patterns/media-section.php` | vídeos/mídias |
| `patterns/government-section.php` | governo municipal |
| `templates/single.html` | artigo/notícia |
| `README-DESIGN-IMPLEMENTATION.md` | documentação |

## Mapeamento Figma → WordPress

| Elemento do Figma | Implementação |
|---|---|
| Utility bar | `parts/header-utility.html` |
| Header principal | `parts/header-main.html` |
| Busca | `core/search` + CSS do tema |
| Navegação | `core/navigation` |
| Events ticker | `parts/events-ticker.html` |
| Hero | `patterns/hero.php` + `portal.js` |
| Portal Cidadão | `patterns/portal-section.php` |
| Portal Empreendedor | mesma seção com variante/conteúdo |
| Portal Servidor | mesma seção com variante/conteúdo |
| Service card | `patterns/service-card.php` |
| Notícias | `patterns/news-section.php` + `core/query` |
| Vídeos/Galeria | `patterns/media-section.php` |
| Governo Municipal | `patterns/government-section.php` |
| Notícia interna | `templates/single.html` |
| Footer | `parts/footer.html` |

## Implicações e pontos que ainda exigem conteúdo real

1. **Assets do Figma:** imagens, logo final, ícones e fontes devem ser fornecidos/configurados no WordPress. O hero não deve depender de caminho relativo fictício.
2. **Eventos:** o ticker atualmente é uma estrutura FSE demonstrativa; para produção, o conteúdo deve vir de uma fonte administrável.
3. **Serviços:** os cards são componentes visuais; a lista definitiva e URLs devem ser cadastradas/configuradas.
4. **Governo:** os links apresentados são placeholders e precisam receber as URLs reais das secretarias.
5. **Vídeo:** o embed do pattern é deliberadamente um ponto de configuração, não uma URL de produção.
6. **Galeria/carrossel:** a composição visual está preparada, mas a fonte de mídia e o comportamento definitivo precisam ser definidos.
7. **Navegação:** os menus devem ser configurados no Site Editor/WordPress.

## Validação recomendada

- [ ] Instalar o tema em WordPress 6.4+.
- [ ] Configurar logo, menus e mídia.
- [ ] Abrir a Home em 1440 px e comparar com o frame do Figma.
- [ ] Validar 1151, 1025, 941 e 560 px conforme o grid do Design System.
- [ ] Validar mobile real, teclado e `prefers-reduced-motion`.
- [ ] Cadastrar posts e verificar Query/related posts.
- [ ] Configurar URLs reais dos serviços e secretarias.
- [ ] Substituir conteúdo demonstrativo do ticker, hero e mídia.
- [ ] Revisar os assets finais e contraste.

## Limitação conhecida desta etapa

A implementação foi feita por código/repositório e não foi renderizada dentro de uma instalação WordPress neste ambiente. Portanto, **não se deve considerar a fidelidade pixel-perfect validada ainda**. A próxima etapa é a validação visual no navegador e os ajustes finos de espaçamento, dimensões, assets e responsividade.
