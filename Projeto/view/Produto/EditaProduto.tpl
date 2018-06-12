            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar Produto
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="EditaProduto" id="formEditaProduto">
                            <div class="form-group">
                                <label>Nome do Produto</label>
                                <input class="form-control obrigatorio" placeholder="Insira o nome do Produto" name="nome" type="text" value="[@nome]">
                            </div>
                            <div class="form-group">
                                <label>Preço do Produto</label>
                                <input class="form-control obrigatorio" placeholder="Insira o preço do Produto" name="preco" type="number" min="0.01" step="0.01" value="[@preco]">
                            </div>
			    <input type="hidden" name="id" value="[@id]">
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button type="reset" class="btn btn-warning">Resetar</button>
                        </form>
                    </div>
                </div>
            </div>
