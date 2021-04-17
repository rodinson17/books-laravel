<template>
    <div>
       <!--  <video autoplay muted loop id="myVideo">
            <source src="/video/library-rigth.mp4" type="video/mp4">
        </video> -->

        <div class="container-fluid main-view">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="view-iframe-one">
                        <div class="vertical-center">
                            <div class="card card-view">
                                <div class="card-body-text text-center">
                                    <h1 class="text-title animate__animated animate__backInDown animate__slow">Los mejores libros para hoy</h1>
                                    <p class="text-subtitle animate__animated animate__backInLeft animate__slower">
                                        Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
                                    </p>

                                    <div class="animate__animated animate__zoomIn animate__slower">
                                        <!-- <div id="content-img-books"> -->
                                            <splide :options="options"
                                                has-slider-wrapper>

                                                <splide-slide v-for="slide in slides" :key="slide.src">
                                                    <vs-tooltip shadow>
                                                        <vs-card @click="click(slide)" type="2">
                                                            <template #title>
                                                                <h3>{{ slide.title }}</h3>
                                                            </template>
                                                            <template #img>
                                                                <img :src="slide.src" alt="slide.alt">
                                                            </template>
                                                            <!-- <template #text>
                                                                <p style="text-align: justify;">{{ slide.title }}</p>
                                                            </template> -->
                                                        </vs-card>

                                                        <template #tooltip>
                                                            <div class="content-tooltip">
                                                                <h4>{{slide.title}}</h4>
                                                                <p style="text-align: justify;">{{slide.description}}</p>
                                                            </div>
                                                        </template>
                                                    </vs-tooltip>
                                                </splide-slide>
                                            </splide>
                                        <!-- </div> -->
                                        <!-- <div id="content-img-books">
                                            <img id="img-book" class="animate__animated animate__zoomIn animate__slower" src="/image/books-list.png" alt="books" width="">
                                            <div @click="bookOne(listBook[0])" id="book-one" class="style-select-book"></div>
                                            <div @click="bookOne(listBook[1])" id="book-two" class="style-select-book"></div>
                                        </div> -->
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
    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    import '@splidejs/splide/dist/css/themes/splide-default.min.css';

    export default {
        components: {
            Splide,
            SplideSlide,
        },
        data() {
            return {
                //urlTransmision: "https://www.youtube.com/embed/oCJQD93dTC4",
                urlTransmision: "https://www.youtube.com/embed/nRxMQTjl8Uc",
                urlBook: "",
                openPDF: false,
                listBook: [],
                options: {
                    //type        : 'loop',
                    rewind      : true,
                    perPage     : 3,
                    perMove     : 1,
                    gap         : '1rem',
                    //height      : '12rem',
                    //cover       : true,
                    autoplay    : true,
                    pauseOnHover: true,
                    arrows      : 'slider',
                },
                slides: [],
            }
        },
        methods: {
            bookOne() {
                this.openPDF = !this.openPDF;
            },
            click( data ) {
                //console.log('esta es: ', data)
                this.openPDF = !this.openPDF;
                this.urlBook = data.url;
            }
        },
        created() {
            /* Lista de libros */
            this.listBook = [
                '/book/PFC_RogerGimeno.pdf',
                '/book/reconocimiento en tiempo real.pdf',
            ]

            this.slides = [
                {
                    title: 'book No. 1',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.',
                    alt: 'hola1',
                    url: '/book/PFC_RogerGimeno.pdf',
                    src:"/image/books/book-1.jpg"
                },
                {
                    title: 'book No. 2',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.',
                    alt: 'hola2',
                    url: '/book/reconocimiento en tiempo real.pdf',
                    src:"/image/books/book-2.png"
                },
                {
                    title: 'book No. 3',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos.',
                    alt: 'hola3',
                    url: '/book/PFC_RogerGimeno.pdf',
                    src:"/image/books/book-3.jpg"
                },
                { title: 'book No. 4',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.',
                    alt: 'hola4',
                    url: '/book/reconocimiento en tiempo real.pdf',
                    src:"/image/books/book-4.jpg"
                },
                {
                    title: 'book No. 5',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.',
                    alt: 'hola5',
                    url: '/book/PFC_RogerGimeno.pdf',
                    src:"/image/books/book-5.jpg"
                },
                {
                    title: 'book No. 6',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos.',
                    alt: 'hola6',
                    url: '/book/reconocimiento en tiempo real.pdf',
                    src:"/image/books/book-6.jpg"
                },
                {
                    title: 'book No. 7',
                    description: 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.',
                    alt: 'hola7',
                    url: '/book/PFC_RogerGimeno.pdf',
                    src:"/image/books/book-7.png"
                },
            ]
        }
    }
</script>

<!-- <style scoped lang="scss"> -->
<style scoped >
    /* Styles silder */

    /* Style backgroud video */
    /* #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
    } */

    .vs-card__img img {
        height: 250px;
    }


    /* Style content url("/image/buckled-book.jpg");*/
    .main-view {
        background-image: url("/image/buckled-book.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100vh;
    }


    /* Style content first iframe */
    .view-iframe-one {
        position: relative;
        min-height: 100vh;
    }
    .card-view {
        background-color: #fff0;
        border: 1px solid rgb(0 0 0 / 0%);
    }
    .card-body-text {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }
    .text-title {
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
    }
    .text-subtitle {
        color: white;
        font-size: 1.1rem;
        text-align: justify;
        margin: 2rem 0;
    }
    #content-img-books {
        position: relative;
        width: 350px; /* tamaño del contenedor = a la imagen de los libros */
        margin: 0 auto;
    }
    #img-book {
        width: 100%;
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

    /* Read PDF */
    #close-pdf-read {
        position: absolute;
        background: rgb(0 0 0 / 46%);
        top: -40px;
        right: 0;
        padding: 0.2rem 1rem;
        cursor: pointer;
    }
    .close-pdf {
        color: #fff;
        font-size: 2rem;
    }
    #pdf-read {
        position: absolute;
        background: rgba(0, 0, 255, 0.151);
        width: 100%;
        height: 100%;
        top: 15px;
    }
    div#close-pdf-read:hover {
        background: #90080861;
    }


    /* Estilos compartidos */
    .vertical-center {
        margin: 0;
        padding: 1rem;
        width: 100%;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }


    /* Style content second iframe */
    .view-iframe-two {
        position: relative;
        min-height: 100vh;
    }
    .view-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 0.5rem !important;
    }
    #iframe-video {
        width: 100%;
        height: 22rem;
    }


    /* Styles responsive */
    @media (min-width: 30px) and (max-width: 991.98px) {

        /* Style content first iframe */
        .view-iframe-one {
            min-height: 60vh;
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

        /* Read PDF */
        #close-pdf-read {
            top: 0px;
        }
        .close-pdf {
            font-size: 1rem;
        }
        #pdf-read {
            top: 30px;
        }


        /* Estilos compartidos */
        .vertical-center {
            padding: 0;
        }


        /* Style content second iframe */
        .view-iframe-two {
            min-height: 40vh;
            contain: content;
        }
        #iframe-video {
            height: 13rem;
        }
    }
</style>
