<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評分反饋</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/zh/thumb/d/da/Fu_Jen_Catholic_University_logo.svg/1200px-Fu_Jen_Catholic_University_logo.svg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@550&display=swap">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="index.css">

    
</head>

<body>
    <div class="wrapper" background="transparent">
        <div class="main">
            <div>
                <div style="margin-left:0%;">
                    <form id="contactForm" style="width: 500px;">
                        <div>
                            <label for="name"><b style="color:#00000099">姓名</b></label><input class="form-control" id="name" type="text" style="width:300px" placeholder="Enter your name..."
                                data-sb-validations="required" />

                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div>
                            <label for="email"><b style="color:#00000099">電子郵件</b></label><input class="form-control" id="email" type="email" style="width:300px" placeholder="Enter your email..."
                                data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div>
                            <label for="phone"><b style="color:#00000099">電話號碼</b></label><input class="form-control" id="phone" type="tel" style="width:300px" placeholder="Enter your phone number..."
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <div>
                            <label for=""><b style="color:#00000099">使用感受</b></label><br>
                            <input type="radio" name="feeling" id=""><label for="" style="color:#00000099">非常滿意</label>
                            <input type="radio" name="feeling" id=""><label for="" style="color:#00000099">滿意</label>
                            <input type="radio" name="feeling" id=""><label for="" style="color:#00000099">一般</label>
                            <input type="radio" name="feeling" id=""><label for="" style="color:#00000099">不滿意</label>
                            <input type="radio" name="feeling" id=""><label for="" style="color:#00000099">非常不滿意</label>
                        </div>
                        <div>
                            <label for="message"><b style="color:#00000099">待改進之處</b></label><textarea class="form-control" id="message" style="width:300px" placeholder="Enter your message here..."
                                style="height: 50rem"></textarea>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase disabled" id="submitButton"
                            type="submit" style="background-color: #00000099; color:white; border: none">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>