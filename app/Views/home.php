<!DOCTYPE html>

<html lang="de">


<head>
    <meta charset="UTF-8">
    <title>Microlab</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#fff;
            color:#666;
        }

        /* HEADER */

        .header{
            height:260px;
            position:relative;
        }

        .logo{
            position:absolute;
            right:250px;
            bottom:25px;
            font-size:72px;
            letter-spacing:12px;
            color:#777;
        }

        /* Horizontal line next to the logo */
        .header-line{
            position:absolute;
            left:0;
            right:431px;
            bottom:45px;
            height:2px;
            background:#bdbdbda3;
        }

        /* MAIN  AREA */

        .main-area{
            width:100%;
            height:300px;
            background:#777;
            position:relative;
            margin-top:40px;
        }

        /* CONTENT part */

        .content-part{
            width:635px;
            background:#fff;
            position:absolute;
            left:50%;
            transform:translateX(-50%);
            top:-15px;
            padding:30px;
            min-height: 320px;
        }

        /* Bottom-left corner in white box */
        .content-part::before{
            content:"";
            position:absolute;
            left:0;
            bottom:0;
            width:20px;
            height:20px;
            border-left:2px solid #777;
            border-bottom:2px solid #777;
            border-radius:0 0 0 5px;
        }

        /* Bottom-right corner in white box */
        .content-part::after{
            content:"";
            position:absolute;
            right:0;
            bottom:0;
            width:20px;
            height:20px;
            border-right:2px solid #777;
            border-bottom:2px solid #777;
            border-radius:0 0 5px 0;
        }

        .content-part h1{
            font-size:24px;
            margin-bottom:20px;
        }

        .content-part p{
            font-size:13px;
            line-height:1.6;
            margin-bottom:15px;
            text-align:justify;
        }

        .article-image{
            width:230px;
            float:right;
            margin-left:20px;
            margin-bottom:15px;
        }

        /* MENU */

        .menu{
            position:absolute;
            top:50px;
            right:50%;
            margin-right:317px;
        }

        .menu a{
            display:block;
            width:180px;
            padding:6px 10px;
            margin-bottom:2px;
            border:1px solid #ddd;
            text-decoration:none;
            color:#fff;
            font-size:13px;
        }







        /* FOOTER */

        .footer{
            height:80px;
            margin-top:280px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 40px;
            font-size:13px;
        }
    </style>


</head>


<body>

<header class="header">
    <div class="header-line"></div>
    <div class="logo">logo</div>
</header>


<section class="main-area">
    <article class="content-part">


        <nav class="menu">
            <a href="#"> Home </a>
            <a href="#"> Erinnerungskalender </a>
            <a href="#"> Menüpunkt 1 </a>
        </nav>


        <div>
            <img
                    src=""
                    alt="Bild"
                    class="article-image"
            >
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dicta iste iure maiores nesciunt quasi
                quis
                quos sint sit tempora!</p>
            <p>Ab adipisci architecto commodi dicta eum illum incidunt itaque modi nobis obcaecati ratione recusandae
                rem sint,
                tenetur ut, voluptatem voluptates.</p>
            <p>Assumenda aut corporis eligendi exercitationem explicabo itaque nihil nobis odio officia pariatur. Ab
                consequatur
                deleniti in magnam nesciunt nisi, odio.</p>
            <p>Accusantium aliquid atque cum delectus, ducimus illo ipsam mollitia nesciunt nihil nostrum obcaecati
                pariatur
                quam quo quos ratione sed tempore.</p>
            <p>Amet animi, asperiores consequatur esse, expedita, illum incidunt ipsam laboriosam magnam minima
                perferendis
                praesentium quasi reprehenderit soluta sunt ullam voluptate!</p>
            <p>Aliquam atque dicta eius laboriosam nostrum. Cumque dolor doloribus expedita facere hic reiciendis rem?
                Eius
                eveniet nam rem tenetur voluptatibus?</p>
            <p>Adipisci beatae consectetur cum cumque delectus dicta illo in libero magni molestias, porro quas
                repudiandae,
                sequi? Assumenda cum illo veniam.</p>


        </div>


    </article>
</section>

<footer class="footer">
</footer>


</body>


</html>