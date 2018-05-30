            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Adicionar Prateleira
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="InserePrateleira" id="formAddPrateleira">
                            <div class="form-group">
                                <label>Andares da Prateleira</label>
                                <input class="form-control obrigatorio" placeholder="Insira a quantidade de andares da prateleira" name="andar" type="number" min="1">
                            </div>
                            <div class="form-group">
                                <label>Quantidade de produtos por andar</label>
                                <input class="form-control obrigatorio" placeholder="Insira a quantidade de produtos por andar na prateleira" name="produtoAndar" type="number" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-warning">Resetar</button>
                        </form>
                    </div>
                </div>
            </div>
