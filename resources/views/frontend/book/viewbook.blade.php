<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>View Book</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <link rel="icon" href="{{ asset('assets/icon.svg') }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>

    <!-- pdf.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>

    <style>
        #pdf-container {
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .page {
            width: 100%;
            display: none;
            transition: opacity 0.3s ease-in-out;
        }

        .visible {
            display: block;
        }
    </style>
</head>

<body>
    <div class="mx-2">
        <div class="pt-2">
            <nav class="bg-gray-800 py-2">
                <div class="">
                    <div class="flex flex-1 mx-4 md:mx-7">
                        <div>
                            <a href="#"
                                class="text-white focus:outline-none mr-2 md:ml-10 lg:ml-24  hover:no-underline"
                                id="prev_page" title="previous page" data-bs-toggle="tooltip"
                                data-bs-placement="bottom">
                                <i class="fas fa-angle-left fa-lg"></i>
                            </a>
                            <div class="inline-block h-[23px] min-h-[1em] w-0.5 self-stretch bg-white">
                                <a href="#" class=" text-white focus:outline-none ml-3 mr-2 hover:no-underline"
                                    id="next_page" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="next page">
                                    <i class="fas fa-angle-right fa-lg "></i>
                                </a>
                            </div>
                            <span class="text-white ml-16 md:ml-[14rem] lg:ml-[30rem]">Page of : </span>
                            <input type="number" id="current_page" value="1"
                                class="w-10 text-center h-5 rounded-sm mr-1" />
                            <span class="text-white">/</span>
                            <span id="page_count" class="text-white"></span>


                            <button class="text-white ml-8 mr-2 md:ml-[10rem] lg:ml-[27rem] hidden md:inline-block"
                                id="zoom_in" data-bs-toggle="tooltip" data-bs-placement="bottom" title="zoom in">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <div class=" h-[23px] min-h-[1em] w-0.5 self-stretch bg-white hidden md:inline-block"
                                id="zoom_out" data-bs-toggle="tooltip" data-bs-placement="bottom" title="zoom out">
                                <button class="text-white focus:outline-none ml-3 mr-2">
                                    <i class="fas fa-search-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="bg-gray-700 py-3 px-3" id="pdf-container">
            <canvas id="canvas" class="justify-center items-center mx-auto w-full md:w-auto"></canvas>
        </div>


    </div>


    <!-- Bootstap JavaScript and Popper.js -->

    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://unpkg.com/pdfjs-dist@2.10.377/build/pdf.worker.min.js';
    </script>


    <!-- Custom JavaScript file -->
    <script>
        const pdf = '{{ asset('storage/' . $bookfile->bookfile) }}';
        const pageCount = document.querySelector('#page_count');
        const currentPage = document.querySelector('#current_page');
        const previousPage = document.querySelector('#prev_page');
        const nextPage = document.querySelector('#next_page');
        const zoomIn = document.querySelector('#zoom_in');
        const zoomOut = document.querySelector('#zoom_out');

        const initialState = {
            pdfDoc: null,
            currentPage: 1,
            pageCount: 0,
            zoom: 1,
        };

        // Render the page.
        const renderPage = () => {
            // Load the first page.
            initialState.pdfDoc
                .getPage(initialState.currentPage)
                .then((page) => {
                    console.log('page', page);

                    const canvas = document.querySelector('#canvas');
                    const ctx = canvas.getContext('2d');
                    const viewport = page.getViewport({
                        scale: initialState.zoom,
                    });

                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the PDF page into the canvas context.
                    const renderCtx = {
                        canvasContext: ctx,
                        viewport: viewport,
                    };
                    page.render(renderCtx);
                });
        };

        // Load the document.
        pdfjsLib
            .getDocument(pdf)
            .promise.then((data) => {
                initialState.pdfDoc = data;
                console.log('pdfDocument', initialState.pdfDoc);

                pageCount.textContent = initialState.pdfDoc.numPages;

                renderPage();
            })
            .catch((err) => {
                alert(err.message);
            });

        const showPrevPage = () => {
            if (initialState.pdfDoc === null || initialState.currentPage <= 1)
                return;
            initialState.currentPage--;
            // Render the current page.
            currentPage.value = initialState.currentPage;
            renderPage();
        };

        const showNextPage = () => {
            if (
                initialState.pdfDoc === null ||
                initialState.currentPage >= initialState.pdfDoc._pdfInfo.numPages
            )
                return;

            initialState.currentPage++;
            currentPage.value = initialState.currentPage;
            renderPage();
        };

        // Button events.
        previousPage.addEventListener('click', showPrevPage);
        nextPage.addEventListener('click', showNextPage);

        // Keypress event.
        currentPage.addEventListener('keypress', (event) => {
            if (initialState.pdfDoc === null) return;
            // Get the key code.
            const keycode = event.keyCode ? event.keyCode : event.which;

            if (keycode === 13) {
                // Get the new page number and render it.
                let desiredPage = currentPage.valueAsNumber;
                initialState.currentPage = Math.min(
                    Math.max(desiredPage, 1),
                    initialState.pdfDoc._pdfInfo.numPages,
                );
                currentPage.value = initialState.currentPage;
                renderPage();
            }
        });

        // Zoom events.
        zoomIn.addEventListener('click', () => {
            if (initialState.pdfDoc === null) return;
            initialState.zoom *= 4 / 3;
            renderPage();
        });

        zoomOut.addEventListener('click', () => {
            if (initialState.pdfDoc === null) return;
            initialState.zoom *= 2 / 3;
            renderPage();
        });

        // Tooltip.
        const tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]'),
        );
        const tooltipList = tooltipTriggerList.map((tooltipTriggerEl) => {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>

</html>
