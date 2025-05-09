@include('inc_assistant/header')
<head>
    <style>
        .main-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container-fluid {
            width: unset;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card{
            flex-grow: 1;
            border-color: transparent;
            box-shadow: 0px 0px 3px ;
        }

        #callbutton {
            width: 50px;
            height: 50px;
            background-color: red;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media only screen and (max-width: 768px){
            .container-fluid {
                margin : 1rem !important; 
            }
        }

    </style>
</head>
    <!-- body -->
        <!-- main-wrapper -->
            <div class="container-fluid m-5">
                <div class="card m-1">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-5">
                                <h3>dsfasdf</h3>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                asdfsd
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" style="height:100px">
                        <div>
                            <h5 class="card-title"> </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center" style="margin-bottom: 0;">
                        <div id="callbutton">
                            <i class="material-icons">call_end</i>
                        </div>
                    </div>
                </div>
            </div>
            
        @include('inc_assistant/footer')

        @if(session('waiting'))
            <script>
                $(document).ready(function(){
                    let timerInterval;
                    Swal.fire({
                    title: "Doctor will be connecting soon...",
                    timer: 2000,
                    timerProgressBar: false,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                    });
                });
            </script>
        @endif
        @php 
            session()->forget('waiting');
        @endphp
    </body>
</html>    