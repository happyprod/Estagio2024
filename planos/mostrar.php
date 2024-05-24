            <section class="planos">

            <a name="ancora4" ></a>

                <div class="titulo">
                    <h1>Planos</h1>
                </div>

                <div class="planos_containers">
                    <div class="planos-pay">
                        <img src="./img/plano 2.jpg" alt="plano 1">
                        <br>
                        <p>Plano Mensal</p>
                        <br>
                        <h2 id="pormes">6€</h2>
                        <h5>Pôr mês</h5>
                        <br>
                        <?php
                        error_reporting(0);
                        
                            if(!isset($_SESSION)){
                                session_start();
                            }

                            $email = $_SESSION['email'];

                            if (!isset($email)) {
                                // sessão não iniciada
                                echo '<a href="./login.php">Assinar</a>';
                            } else {
                                echo '<button class="checkout-button" id="checkout-button1">Pagar</button>';
                                // sessão iniciada
                            }
                        ?>
                        <br>
                        <h6>Formas de pagamento aceitas:</h6>
                    </div>


                    <div class="planos-pay">
                        <img src="./img/plano 1.jpg" alt="plano 1">
                        <br>
                        <p>Plano Anual</p>
                        <br>
                        <h2 id="porano">60€</h2>
                        <h5>Pôr Ano</h5>
                        <br>
                        <?php
                        error_reporting(0);

                            if(!isset($_SESSION)){
                                session_start();
                            }

                            $email = $_SESSION['email'];

                            if (!isset($email)) {
                                // sessão não iniciada
                                echo '<a href="./login.php">Assinar</a>';
                            } else {
                                echo '<button class="checkout-button" id="checkout-button2">Pagar</button>';
                                // sessão iniciada
                            }
                        ?>
                        <br>
                        <h6>Formas de pagamento aceitas:</h6>
                    </div>

                    <div class="planos-pay">
                        <img src="./img/plano 3.jpg" alt="plano 1">
                        <br>
                        <p>Plano Vitalício </p>
                        <br>
                        <h2 id="umavez">120€</h2>
                        <h5>Uma vez</h5>
                        <br>
                        <?php
                        error_reporting(0);
                            if(!isset($_SESSION)){
                                session_start();
                            }

                            $email = $_SESSION['email'];

                            if (!isset($email)) {
                                // sessão não iniciada
                                echo '<a href="./login.php">Assinar</a>';
                            } else {
                                echo '<button class="checkout-button" id="checkout-button3">Pagar</button>';
                                // sessão iniciada
                            }
                        ?>
                        <br>
                        <h6>Formas de pagamento aceitas:</h6>
                    </div>
                
                </div>
            </section>