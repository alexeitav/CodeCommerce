## Anotações para o Tutor

Abaixo seguem algumas anotações...

## Fase 04: CRUD

Como não foi definido o que fazer com os campos "featured" e "recommend" do Produtos eu fiz assim:
 - deixei como valor default na migration esses campos como true
 - não coloquei esses campos nos formulários de create e edit products.

Aí, mais para frente, quando for definido o que fazer eu completo.


## Fase 03: Criação de Rotas

Desculpe, mas não entendi direito se era para criar todas as rotas do CRUD apontando para um único controle ou se era para separar (uma rota para Create, outra para o Update e assim por diante....).

Eu acabei separando e misturando com o "Route Model Bind".

Ou seja, nas rotas para Update, Delete e Get eu passei o model, e como não sabia para onde jogar depois só dei um dd para mostrar o objeto.

Já na rota de "Create" cadastrei como sendo um tipo "post" e jogando para a action index do controller (que não faz nada).

Não sei se era bem isso, mas fiz assim...heheh

Na parte de validação dos parâmetros eu só validei se o product ou category está no formato numérico (não aceita string).

Na parte de nomear as rotas eu fiz seguindo um padrão qualquer, uma vez que não foi especificado.
