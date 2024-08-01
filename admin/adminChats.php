<?php
require_once __DIR__ . "/adminHeader.php";
?>
<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-3">
                <img src="../assets/font_awesome/undraw_chat_re_re1u.svg" alt="Description of SVG" width="200" height="200">
            </div>
            <div class="col-9 d-flex justify-content-center align-items-center">
                Start chatting
            </div>
        </div>


    </div>
    <div class="card mt-3">
        <div class="card-header">
            Chatting
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-10">

                    <!-- sender -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow  bg-dark">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ending sender -->

                    <!-- receiver -->

                    <div class="row d-flex justify-content-end">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ending receiver -->

                    <div class="row">
                        <div class="col-12">
                            <form action="">
                                <input type="text" name="message" placeholder="Type a message" class="form-control p-relative w-100" id="">
                                <button class="btn" type="submit" id="button"><i class="fa fa-paper-plane"></i></button>
                                <style>
                                    #button {
                                        position: absolute;
                                        margin-top: -40px;
                                        margin-left: 50rem;
                                    }

                                    #button:hover {
                                        color: red;
                                    }

                                    @media screen and (max-width:1200px) {
                                        #button{
                                            margin-top: -40px;
                                            margin-left: 7rem;
                                        }
                                    }
                                </style>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/adminFooter.php";
?>