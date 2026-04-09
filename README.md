# 🏗️ ConstruTech - Sistema de Gestão de Estoque

## 📌 Sobre o Projeto

O **ConstruTech** é um sistema de gestão de estoque desenvolvido para ajudar o Sr. Vicente, dono de uma loja de materiais de construção, a organizar seus produtos e evitar prejuízos.

Com o aumento das reformas no bairro, o controle manual deixou de ser eficiente, causando problemas como:

* Venda de produtos fora de estoque
* Cobrança incorreta de itens
* Falta de organização geral no inventário

Este sistema foi criado para rodar diretamente no navegador, oferecendo praticidade e controle em tempo real.

---

## 🎯 Objetivo

Desenvolver um protótipo funcional de um sistema de estoque que permita:

* Organizar produtos por categorias
* Controlar quantidades e preços
* Visualizar o estoque de forma clara
* Evitar perdas financeiras

---

## 🛠️ Funcionalidades

### 📂 1. Categorização de Produtos

Os produtos devem ser classificados obrigatoriamente em uma das seguintes categorias:

* **Bruto** (ex: cimento, areia)
* **Ferramentas** (ex: martelos, furadeiras)
* **Acabamento** (ex: pisos, torneiras)

---

### 💾 2. Persistência com Sessão

* Utilização de `$_SESSION` (PHP)
* Garante que os dados não sejam perdidos ao atualizar a página

---

### 📝 3. Painel de Cadastro

Formulário para inserir novos produtos com os seguintes campos:

* Nome do Item
* Categoria
* Quantidade
* Preço Unitário

---

### 📊 4. Visualização do Inventário

Exibição dos produtos em uma tabela contendo:

* Nome
* Categoria
* Quantidade
* Preço unitário
* Valor total por item (Quantidade × Preço)
* Local onde esta o produto
* Status

---

### ⚠️ 5. Lógica de Reposição

* Itens com estoque baixo devem ser destacados visualmente
* Sugestões:

  * Linha amarela
  * Ícone de alerta ⚠️
* O limite mínimo de estoque deve ser definido no sistema

---

### 🔄 6. Movimentação de Itens

Permitir:

* ➕ Adicionar unidades ao estoque
* ➖ Remover unidades do estoque

---

### 💰 7. Resumo Financeiro

* Exibir no rodapé da página:

  * 💵 Valor total de todos os produtos em estoque

---

### 🎨 8. Interface Profissional

* Layout organizado utilizando **CSS**
* Foco em:

  * Clareza das informações
  * Facilidade de uso
  * Visual limpo para uso no balcão

---

## 🧪 Tecnologias Utilizadas

* **HTML** → Estrutura da página
* **CSS** → Estilização e layout
* **PHP** → Lógica do sistema e controle de sessão

---

## 🚀 Como Executar o Projeto

1. Clone o repositório:

```bash
git clone <SEU_REPOSITORIO>
```

2. Coloque os arquivos em um servidor local (ex: XAMPP, WAMP ou LAMP)

3. Acesse no navegador:

```
http://localhost/seu-projeto
```

---

## 📌 Possíveis Melhorias Futuras

* Integração com banco de dados (MySQL)
* Sistema de login para funcionários
* Relatórios de vendas
* Filtro e busca de produtos
* Dashboard com gráficos

---

## 👨‍💼 Contexto do Cliente

Este projeto foi pensado para resolver um problema real enfrentado pelo Sr. Vicente (personagem fictício da atividade), garantindo:

* Mais organização
* Controle de estoque eficiente
* Redução de prejuízos
