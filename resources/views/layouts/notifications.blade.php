<style>
    @import "http://fonts.googleapis.com/css?family=Raleway";

    /*----------------------------------------------
CSS settings for HTML div Exact Center
------------------------------------------------*/
    #abc {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
        position: fixed;
        background-color: rgba(100, 100, 100, 0.9);
        overflow: auto
    }

  
    img#close {
        max-width: 50px;
        height: 50px;
        width: auto;
        position: absolute;
        right: 5px;
        max-height: 30 px;
        background-color: transparent;
        height: auto;
        top: 5px;
        cursor: pointer
    }


    div#popupContact {
        position: absolute;
        left: 50%;
        background-color: #ffffff;
        top: 17%;
        margin-left: -202px;
        font-family: 'Raleway', sans-serif
    }

    #form1 {
        max-width: 550px;
        min-width: 250px;
        padding: 10px 50px;
        border: 2px solid white;
        border-radius: 10px;
        font-family: raleway;
        background-color: #ffffff
    }

    p {
        margin-top: 30px
    }

    h2 {
        background-color: #FEFFED;
        padding: 20px 35px;
        margin: -10px -50px;
        text-align: center;
        border-radius: 10px 10px 0 0
    }

    hr {
        margin: 10px -50px;
        border: 0;
        border-top: 1px solid #ccc
    }

    input[type=text] {
        width: 82%;
        padding: 10px;
        margin-top: 30px;
        border: 1px solid #ccc;
        padding-left: 40px;
        font-size: 16px;
        font-family: raleway
    }

    #name {
        background-image: url(../images/name.jpg);
        background-repeat: no-repeat;
        background-position: 5px 7px
    }

    #email {
        background-image: url(../images/email.png);
        background-repeat: no-repeat;
        background-position: 5px 7px
    }

    textarea {
        background-image: url(../images/msg.png);
        background-repeat: no-repeat;
        background-position: 5px 7px;
        width: 82%;
        height: 95px;
        padding: 10px;
        resize: none;
        margin-top: 30px;
        border: 1px solid #ccc;
        padding-left: 40px;
        font-size: 16px;
        font-family: raleway;
        margin-bottom: 30px
    }

    #submit {
        text-decoration: none;
        width: 100%;
        text-align: center;
        display: block;
        background-color: green;
        color: #fff;
        padding: 10px 0;
        font-size: 20px;
        cursor: pointer;
        border-radius: 5px
    }

    span {
        font-weight: 700
    }

    button {
        width: 100 px;
        height: 45px;
        border-radius: 3px;
        background-color: green;
        color: #fff;
        font-family: 'Raleway', sans-serif;
        font-size: 18px;
        cursor: pointer
    }
</style>


<div id="body" style="overflow:hidden;">
    <div id="abc">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->
            <form action="{{ route('notif') }}" id="form1" method="post" name="form">
                {{ csrf_field() }}

                <img id="close" src="https://png.pngtree.com/png-vector/20190603/ourlarge/pngtree-icon-close-button-png-image_1357955.jpg" onclick="div_hide()">
                <h2>إشعار الي المستخدم</h2>
                <hr>
                <input type="hidden" id="user_id" name="id" placeholder="اكتب عنوان الرسالة" type="text">
                <input id="name" name="title" placeholder="اكتب عنوان الرسالة" type="text">
                <textarea id="msg" name="message" placeholder="اكتب نص الرسالة"></textarea>
                <input type="submit" onClick="div_hide()" id="submit"></a>
            </form>
        </div>
        <!-- Popup Div Ends Here -->
    </div>

</div>

<script>

    // Validating Empty Field
    function check_empty() {
        if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
            alert("Fill All Fields !");
        } else {
            document.getElementById('form').submit();
            alert("Form Submitted Successfully...");
        }
    }
    //Function To Display Popup
    function div_show(id) {
        document.getElementById('abc').style.display = "block";
        $("#user_id").attr("value", id);
    

    }
    //Function to Hide Popup
    function div_hide() {
        document.getElementById('abc').style.display = "none";
        $("#name").attr("value", "");
        $("#msg").attr("value", "");
    }
</script>