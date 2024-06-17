<?php
echo '
<div class="col-md-12 mt-2">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary btn-sm w-100 d-flex justify-content-center text-center mb-0" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">
        Alterar Projeto
    </button>


    <!-- Modal -->
    <div class="modal fade" id="menu' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" id="update-button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="alterarImageContainer(imageContainer' . $count . '); updateData(' . $count . ', ' . $id . ', ' . $p_id . ')" data-bs-target="#alterarimagens' . $count . '">
                                Alterar Imagens
                            </button>
                        </div>

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="updateDataInfo(' . $count . ', ' . $id . ', ' . $p_id . ')" data-bs-target="#modalAlterarInfo' . $count . '">
                                Alterar Informações
                            </button>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="updateStats(' . $p_id . ')" data-bs-target="#exampleModalMessage' . $count . '">
                                Ver Estatisticas
                            </button>
                        </div>

                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-success btn-block mb-3 w-100" data-bs-toggle="modal" onclick="updatePrivacy(' . $count . ', ' . $p_id . ')" data-bs-target="#splitModal' . $count . '">
                                Privacidade
                            </button>
                        </div>

                        <div class="row d-flex justify-content-center mx-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-danger btn-block mb-3 w-100" data-bs-toggle="modal" data-bs-target="#apagarProjeto' . $count . '">
                                Apagar Projeto
                            </button>
                        </div>

                        <div class="modal-footer" style="height: 4em;">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalMessage' . $count . '" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Estatísticas</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <div class="modal-body">
                   
                <div id="alterarEstatisticas' . $count . '">
                    <!-- conteudo dinamico será exibido aquim -->
                </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Voltar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="splitModal' . $count . '" tabindex="-1" data-target="privacidade' . $count . '" aria-labelledby="splitModalLabel" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Privacidade </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <div class="modal-body" style="padding: 0px;">
                    <div id="alterarprivacidade' . $count . '" class="modalcompletoprivacidade">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarPrivacidade(' . $p_id . ', ' . $count . ')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalAlterarInfo' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Informações</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">


                <div id="alterarInfo' . $count . '">
                                

                </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                    <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarSobre(' . $p_id . ')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="apagarProjeto' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Apagar Projeto</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="d-flex flex-column align-items-center text-center mt-3">
                <img alt="svgImg" style="height: 200px; width: 200px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDY0IDY0Ij4KPHJhZGlhbEdyYWRpZW50IGlkPSJTcll1UzBNWURHSDltMFNSQzZfbm9hX1B2Ymx3NzRlbHV6Ul9ncjEiIGN4PSIzMS40MTciIGN5PSItMTA5OC4wODMiIHI9IjI4Ljc3IiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMTEyOCkiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmNGUwOWQiPjwvc3RvcD48c3RvcCBvZmZzZXQ9Ii4yMjYiIHN0b3AtY29sb3I9IiNmOGU4YjUiPjwvc3RvcD48c3RvcCBvZmZzZXQ9Ii41MTMiIHN0b3AtY29sb3I9IiNmY2YwY2QiPjwvc3RvcD48c3RvcCBvZmZzZXQ9Ii43NzgiIHN0b3AtY29sb3I9IiNmZWY0ZGMiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmZmY2ZTEiPjwvc3RvcD48L3JhZGlhbEdyYWRpZW50PjxwYXRoIGZpbGw9InVybCgjU3JZdVMwTVlER0g5bTBTUkM2X25vYV9QdmJsdzc0ZWx1elJfZ3IxKSIgZD0iTTcuNSw2NEw3LjUsNjRjMS45MzMsMCwzLjUtMS41NjcsMy41LTMuNWwwLDBjMC0xLjkzMy0xLjU2Ny0zLjUtMy41LTMuNWwwLDAgQzUuNTY3LDU3LDQsNTguNTY3LDQsNjAuNWwwLDBDNCw2Mi40MzMsNS41NjcsNjQsNy41LDY0eiI+PC9wYXRoPjxyYWRpYWxHcmFkaWVudCBpZD0iU3JZdVMwTVlER0g5bTBTUkM2X25vYl9QdmJsdzc0ZWx1elJfZ3IyIiBjeD0iMzEuNSIgY3k9Ii0xMDk2IiByPSIzMS43NTEiIGdyYWRpZW50VHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAxMTI4KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2Y0ZTA5ZCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjIyNiIgc3RvcC1jb2xvcj0iI2Y4ZThiNSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjUxMyIgc3RvcC1jb2xvcj0iI2ZjZjBjZCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjc3OCIgc3RvcC1jb2xvcj0iI2ZlZjRkYyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmZjZlMSI+PC9zdG9wPjwvcmFkaWFsR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCNTcll1UzBNWURHSDltMFNSQzZfbm9iX1B2Ymx3NzRlbHV6Ul9ncjIpIiBkPSJNNjIsMjAuNUw2MiwyMC41YzAtMi40ODUtMi4wMTUtNC41LTQuNS00LjVINDljLTIuMjA5LDAtNC0xLjc5MS00LTRsMCwwIGMwLTIuMjA5LDEuNzkxLTQsNC00aDJjMi4yMDksMCw0LTEuNzkxLDQtNGwwLDBjMC0yLjIwOS0xLjc5MS00LTQtNEgyMGMtMi4yMDksMC00LDEuNzkxLTQsNGwwLDBjMCwyLjIwOSwxLjc5MSw0LDQsNGgyIGMxLjY1NywwLDMsMS4zNDMsMywzbDAsMGMwLDEuNjU3LTEuMzQzLDMtMywzSDcuNUM1LjU2NywxNCw0LDE1LjU2Nyw0LDE3LjVsMCwwQzQsMTkuNDMzLDUuNTY3LDIxLDcuNSwyMUg5YzEuNjU3LDAsMywxLjM0MywzLDMgbDAsMGMwLDEuNjU3LTEuMzQzLDMtMywzSDVjLTIuNzYxLDAtNSwyLjIzOS01LDVsMCwwYzAsMi43NjEsMi4yMzksNSw1LDVoMi41YzEuOTMzLDAsMy41LDEuNTY3LDMuNSwzLjVsMCwwIGMwLDEuOTMzLTEuNTY3LDMuNS0zLjUsMy41SDZjLTIuMjA5LDAtNCwxLjc5MS00LDRsMCwwYzAsMi4yMDksMS43OTEsNCw0LDRoMTEuNWMxLjM4MSwwLDIuNSwxLjExOSwyLjUsMi41bDAsMCBjMCwxLjM4MS0xLjExOSwyLjUtMi41LDIuNWwwLDBjLTEuOTMzLDAtMy41LDEuNTY3LTMuNSwzLjVsMCwwYzAsMS45MzMsMS41NjcsMy41LDMuNSwzLjVoMzVjMS45MzMsMCwzLjUtMS41NjcsMy41LTMuNWwwLDAgYzAtMS45MzMtMS41NjctMy41LTMuNS0zLjVINTJjLTEuMTA1LDAtNy0wLjg5NS03LTJsMCwwYzAtMS4xMDUsMC44OTUtMiwyLTJoMTJjMi4yMDksMCw0LTEuNzkxLDQtNGwwLDBjMC0yLjIwOS0xLjc5MS00LTQtNGgtMi41IGMtMS4zODEsMC0yLjUtMS4xMTktMi41LTIuNWwwLDBjMC0xLjM4MSwxLjExOS0yLjUsMi41LTIuNUg1N2MyLjIwOSwwLDQtMS43OTEsNC00bDAsMGMwLTIuMjA5LTEuNzkxLTQtNC00aC00LjUgYy0xLjkzMywwLTMuNS0xLjU2Ny0zLjUtMy41bDAsMGMwLTEuOTMzLDEuNTY3LTMuNSwzLjUtMy41aDVDNTkuOTg1LDI1LDYyLDIyLjk4NSw2MiwyMC41eiI+PC9wYXRoPjxnPjxsaW5lYXJHcmFkaWVudCBpZD0iU3JZdVMwTVlER0g5bTBTUkM2X25vY19QdmJsdzc0ZWx1elJfZ3IzIiB4MT0iMzIiIHgyPSIzMiIgeTE9IjUzIiB5Mj0iOCIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAtMSAwIDY0KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2RlZjlmZiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjI4MiIgc3RvcC1jb2xvcj0iI2NmZjZmZiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjgyMyIgc3RvcC1jb2xvcj0iI2E3ZWZmZiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzk5ZWNmZiI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCNTcll1UzBNWURHSDltMFNSQzZfbm9jX1B2Ymx3NzRlbHV6Ul9ncjMpIiBkPSJNMTUuMjExLDExaDMzLjU3OGMzLjAyNCwwLDUuMzU2LDIuNjYzLDQuOTU2LDUuNjYxbC00LjY2NywzNSBDNDguNzQ3LDU0LjE0NSw0Ni42MjgsNTYsNDQuMTIyLDU2SDE5Ljg3OGMtMi41MDYsMC00LjYyNS0xLjg1NS00Ljk1Ni00LjMzOWwtNC42NjctMzVDOS44NTUsMTMuNjYzLDEyLjE4NywxMSwxNS4yMTEsMTF6Ij48L3BhdGg+PGxpbmVhckdyYWRpZW50IGlkPSJTcll1UzBNWURHSDltMFNSQzZfbm9kX1B2Ymx3NzRlbHV6Ul9ncjQiIHgxPSIzMiIgeDI9IjMyIiB5MT0iNDYiIHkyPSI1NiIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAtMSAwIDY0KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzQxYmZlYyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjIzMiIgc3RvcC1jb2xvcj0iIzRjYzVlZiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjY0NCIgc3RvcC1jb2xvcj0iIzZiZDRmNiI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzhhZTRmZCI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCNTcll1UzBNWURHSDltMFNSQzZfbm9kX1B2Ymx3NzRlbHV6Ul9ncjQpIiBkPSJNNTMsMThIMTFjLTEuMTA1LDAtMi0wLjg5NS0yLTJ2LTZjMC0xLjEwNSwwLjg5NS0yLDItMmg0MmMxLjEwNSwwLDIsMC44OTUsMiwydjYgQzU1LDE3LjEwNSw1NC4xMDUsMTgsNTMsMTh6Ij48L3BhdGg+PC9nPjxnPjxsaW5lYXJHcmFkaWVudCBpZD0iU3JZdVMwTVlER0g5bTBTUkM2X25vZV9QdmJsdzc0ZWx1elJfZ3I1IiB4MT0iNTIiIHgyPSI1MiIgeTE9Ii0xMDY0IiB5Mj0iLTEwODgiIGdyYWRpZW50VHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAxMTI4KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmNTg0MCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjAwNyIgc3RvcC1jb2xvcj0iI2ZmNTg0MCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjk4OSIgc3RvcC1jb2xvcj0iI2ZhNTI4YyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZhNTI4YyI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PHBhdGggZmlsbD0idXJsKCNTcll1UzBNWURHSDltMFNSQzZfbm9lX1B2Ymx3NzRlbHV6Ul9ncjUpIiBkPSJNNTIsNDBjLTYuNjI3LDAtMTIsNS4zNzMtMTIsMTJzNS4zNzMsMTIsMTIsMTJzMTItNS4zNzMsMTItMTJTNTguNjI3LDQwLDUyLDQweiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik01Ny40MTcsNDkuNDEybC04LjAwNSw4LjAwNWMtMC43NzgsMC43NzgtMi4wNTEsMC43NzgtMi44MjgsMGwwLDAgYy0wLjc3OC0wLjc3OC0wLjc3OC0yLjA1MSwwLTIuODI4bDguMDA1LTguMDA1YzAuNzc4LTAuNzc4LDIuMDUxLTAuNzc4LDIuODI4LDBsMCwwQzU4LjE5NCw0Ny4zNjEsNTguMTk0LDQ4LjYzNCw1Ny40MTcsNDkuNDEyeiI+PC9wYXRoPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik00Ni41ODMsNDkuNDEybDguMDA1LDguMDA1YzAuNzc4LDAuNzc4LDIuMDUxLDAuNzc4LDIuODI4LDBsMCwwYzAuNzc4LTAuNzc4LDAuNzc4LTIuMDUxLDAtMi44MjggbC04LjAwNS04LjAwNWMtMC43NzgtMC43NzgtMi4wNTEtMC43NzgtMi44MjgsMGwwLDBDNDUuODA2LDQ3LjM2MSw0NS44MDYsNDguNjM0LDQ2LjU4Myw0OS40MTJ6Ij48L3BhdGg+PC9nPgo8L3N2Zz4="/>
                
                <div class="mt-4">
                    <h4>Deseja apagar este projeto?</h4>
                    <p style="font-size: 15px;">Deseja realmente apagar este projeto?<br> Este processo não pode ser desfeito.</p>
                </div>
            </div>
        </div>
        
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                <button type="button" class="btn bg-gradient-success" data-bs-dismiss="modal" onclick="apagarProjeto(' . $p_id . ')">Confirmar</button>
            </div>
    </div>
    </div>
</div>




<div class="modal fade" id="alterarimagens' . $count . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">' . $p_nome . ' - Alterar Imagens</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row sortable-list" id="imageContainer' . $count . '">
                    <!-- conteudo dinamico será exibido aquim -->
                </div>

            <div class="modal-footer">
                <button type="button" onclick="verificarOArray()" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#menu' . $count . '">Cancelar</button>
                <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#menu' . $count . '" onclick="guardarImagens(' . $count . ')">Confirmar</button>
            </div>
        </div>
    </div>
    </div>
</div>';
