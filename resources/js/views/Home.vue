<template>
    <div>
        <video autoplay muted loop id="myVideo">
            <source src="/video/library-rigth.mp4" type="video/mp4">
        </video>
        <div class="container-fluid main-view">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="view-iframe-one">
                        <div class="vertical-center">
                            <div class="card card-view">
                                <div class="card-body-text text-center">
                                    <h1 class="text-title animate__animated animate__backInDown animate__slow">Los mejores libros para hoy</h1>
                                    <p class="text-subtitle animate__animated animate__jackInTheBox animate__slower">
                                        Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
                                    </p>
                                    <div class="content-info">
                                        <div id="content-img-books">
                                            <img id="img-book" class="animate__animated animate__zoomIn animate__slower" src="/image/books-list.png" alt="books" width="">
                                            <div @click="bookOne(listBook[0])" id="book-one" class="style-select-book"></div>
                                            <div @click="bookOne(listBook[1])" id="book-two" class="style-select-book"></div>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="openPDF" @click="bookOne" id="close-pdf-read">
                                    <span class="close-pdf">X</span>
                                </div>
                                <div v-if="openPDF" @click="bookOne" id="pdf-read">
                                    <!-- <iframe :src="urlBook + '#toolbar=0'" sin opciones -->
                                    <embed :src="urlBook"
                                        type="application/pdf"
                                        width="100%"
                                        height="100%" />
                                    <!-- <iframe :src="urlBook"
                                        type="application/pdf"
                                        width="100%"
                                        height="100%" /> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="view-iframe-two">
                        <div class="vertical-center">
                            <div class="card animate__animated animate__slideInRight animate__slower">
                                <div class="view-body">
                                    <iframe id="iframe-video" width=""
                                        height=""
                                        :src="urlTransmision"
                                        title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                urlTransmision: "https://www.youtube.com/embed/oCJQD93dTC4",
                urlBook: "/book/PFC_RogerGimeno.pdf",
                openPDF: false,
                listBook: [],
            }
        },
        methods: {
            bookOne( url = '' ) {
                this.openPDF = !this.openPDF;
                this.urlBook = url;
            }
        },
        created() {
            /* Lista de libros */
            this.listBook = [
                '/book/PFC_RogerGimeno.pdf',
                '/book/reconocimiento en tiempo real.pdf',
            ]
        }
    }
</script>

<style>
    #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
    }

    .card-view {
        background-color: #fff0;
        border: 1px solid rgb(0 0 0 / 0%);
    }
    .text-subtitle {
        color: white;
        font-size: 1.1rem;
        text-align: justify;
        margin: 2rem 0;
    }
    .text-title {
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
    }
    .main-view {
        /* background-image: url("/image/backgroud-image.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; */
        min-height: 100vh;
    }
    .view-iframe-one {
        position: relative;
        min-height: 100vh;
    }
    .view-iframe-two {
        position: relative;
        min-height: 100vh;
    }
    .card-body-text {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }
    .vertical-center {
        margin: 0;
        padding: 1rem;
        width: 100%;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .view-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 0.5rem !important;
    }
    .content-info {
        /* position: relative; */
    }

    #iframe-video {
        width: 100%;
        height: 22rem;
    }

    /* style for books */
    #book-one {
        top: 11%;
        width: 2.5rem;
        right: 5%;
        height: 85%;
    }
    #book-two {
        top: 10%;
        width: 2.7rem;
        left: 4%;
        height: 86%;
    }
    .style-select-book {
        position: absolute;
        background: transparent;
        cursor: pointer;
    }
    .style-select-book:hover {
        background: #ff00003d;
    }
    #content-img-books {
        position: relative;
        width: 350px; /* tamaño del contenedor = a la imagen de los libros */
        margin: 0 auto;
    }
    #img-book {
        width: 100%;
    }

    /* Read PDF */
    #pdf-read {
        position: absolute;
        background: rgba(0, 0, 255, 0.151);
        width: 100%;
        height: 100%;
        top: 15px;
    }
    #close-pdf-read {
        position: absolute;
        background: rgb(0 0 0 / 46%);
        top: -40px;
        right: 0;
        padding: 0.2rem 1rem;
        cursor: pointer;
    }
    div#close-pdf-read:hover {
        background: #90080861;
    }
    .close-pdf {
        color: #fff;
        font-size: 2rem;
    }

    /* Animaciones */
    /* .animate__animated {
        -webkit-animation-duration: 2s;
        animation-duration: 2s;
        -webkit-animation-duration: var(--animate-duration);
        animation-duration: var(--animate-duration);
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    } */

    @media (min-width: 30px) and (max-width: 991.98px) {
        .vertical-center {
            padding: 0;
        }
        .view-iframe-one {
            min-height: 60vh;
            contain: content;
        }
        .view-iframe-two {
            min-height: 40vh;
            contain: content;
        }
        .card-body-text {
            padding: 0.8rem;
        }

        .text-title {
            font-size: 1.5rem;
        }
        .text-subtitle {
            font-size: 0.8rem;
            margin: 1rem 0;
        }

        #close-pdf-read {
            top: 0px;
        }
        .close-pdf {
            font-size: 1rem;
        }
        #pdf-read {
            top: 30px;
        }

        #iframe-video {
            height: 13rem;
        }
    }
</style>
