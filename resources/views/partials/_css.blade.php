<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css">



<style>
    body {
        font-family: Verdana, sans-serif;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    .row > .column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        /*float: left;*/
        margin-left: 40px;
        width: 150px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 10px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 50px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer
    }

    /* Number text (1/3 etc) */

    img {
        margin-bottom: -4px;
    }



    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }
</style>