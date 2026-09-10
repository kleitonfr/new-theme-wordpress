# assets/img — imagens do tema

## ⚠️ As três imagens deste diretório são PROVISÓRIAS

Elas foram geradas apenas para que o layout do header e do hero possa ser avaliado
antes de as artes oficiais estarem disponíveis. **Nenhuma delas deve ir para produção.**

| Arquivo provisório | Substituir por | Onde é usado | Dimensão mínima recomendada |
|---|---|---|---|
| `brasao-placeholder.svg` | `brasao.png` | Marca no header principal | 128 × 128 px |
| `banner-artwork-placeholder.svg` | `banner-artwork.jpg` | Camada de fundo do hero | 1920 × 1080 px |
| `banner-strip-placeholder.svg` | `banner-strip.jpg` | Faixa decorativa no topo do hero | 1920 × 256 px |

## Como substituir

1. Copie a arte oficial para este diretório com o nome da coluna "Substituir por".
2. Abra `assets/css/portal.css` e, no bloco `:root` do topo do arquivo, troque o valor
   das três variáveis:

   ```css
   :root {
     --pmc-img-brasao: url("../img/brasao.png");
     --pmc-img-hero-artwork: url("../img/banner-artwork.jpg");
     --pmc-img-hero-strip: url("../img/banner-strip.jpg");
   }
   ```

3. Apague os arquivos `*-placeholder.svg`.

Nenhum outro arquivo do tema precisa ser alterado — os caminhos das imagens estão
centralizados nessas três variáveis.

## Observação sobre o brasão no header

O header usa a imagem acima como fundo CSS, o que garante que a marca apareça
imediatamente após a instalação. Se preferir gerenciar o brasão pela Biblioteca de
Mídia (**Aparência → Personalizar → Identidade do Site**), troque o bloco
`core/html` da marca em `parts/header-brand.html` por um bloco `core/site-logo`.
