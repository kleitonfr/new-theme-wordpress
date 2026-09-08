# Fontes locais do tema

O `theme.json` declara `fontFace` para **Montserrat** e **Inter** apontando para esta pasta.
Enquanto os arquivos não estiverem aqui, o navegador cai no fallback `Segoe UI` — o site
funciona, mas a tipografia não corresponde ao Design System.

## Arquivos esperados

| Arquivo | Fonte | Obrigatório |
|---|---|---|
| `montserrat-variable.woff2` | Montserrat (variable, peso 100–900) | preferencial |
| `montserrat-variable.ttf` | Montserrat (variable, peso 100–900) | fallback |
| `inter-variable.woff2` | Inter (variable, peso 100–900) | preferencial |
| `inter-variable.ttf` | Inter (variable, peso 100–900) | fallback |

O `src` de cada `fontFace` lista o `.woff2` primeiro e o `.ttf` depois. Basta ter **um dos dois**
por família — o `.woff2` é bem menor e é o recomendado.

## Como obter

1. Baixe as famílias em https://fonts.google.com/specimen/Montserrat e
   https://fonts.google.com/specimen/Inter (botão **Get font → Download all**).
2. Dentro do zip, use os arquivos **variable**:
   - `Montserrat-VariableFont_wght.ttf`
   - `Inter-VariableFont_opsz,wght.ttf`
3. Renomeie para `montserrat-variable.ttf` e `inter-variable.ttf` e coloque nesta pasta.
4. (Recomendado) Converta para `.woff2` — por exemplo em https://cloudconvert.com/ttf-to-woff2
   ou via `woff2_compress` — e nomeie `montserrat-variable.woff2` / `inter-variable.woff2`.

## Por que local e não Google Fonts

Carregar de `fonts.googleapis.com` envia o IP de cada visitante para um terceiro. Para um
portal público isso é um ponto sensível de privacidade (LGPD). Hospedar localmente também
elimina uma requisição a domínio externo e melhora o tempo de primeira renderização.

## Depois de adicionar os arquivos

1. Recarregue o front-end e confira no DevTools (aba Network, filtro `Font`) se os arquivos
   estão sendo baixados com status 200.
2. Abra o Site Editor e verifique se Montserrat e Inter aparecem na lista de fontes.
3. Limpe qualquer cache de página / CDN.
