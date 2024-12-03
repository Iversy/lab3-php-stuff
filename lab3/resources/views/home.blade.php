<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музыкальные альбомы</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>


    <div class="base">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid justify-content-start">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Frusinfo.info%2Fwp-content%2Fuploads%2F0%2Fd%2F5%2F0d566f372942bc64e69fb2ae9aea22f6.png&f=1&nofb=1&ipt=1078818f6e04d4fedf6cd6a3b8547fe57fef8b8cf580598e27b9b4f531d0aa1f&ipo=images"
                    class="img" alt="nota">
                <a class="navbar-brand" href="#">Музыкальные альбомы</a>
                <button type="button" class="btn btn-primary" id="liveToastBtn" onclick="window.location='{{ route('albums.index') }}'">
    Загрузить
</button>

            </div>
        </nav>
        <h1>Альбомы</h1>

<div class="container text-center overflow-hidden">
    <div class="row gy-3 gx-2 row-cols-1 row-cols-xs-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6">
        @foreach($albums as $album)
            <div class="col">
                <div class="card">
                    <p>{{ $album->year_of_release }}</p>
                    <img src="{{ $album->cover_image_url }}" class="img-fluid" alt="{{ $album->album_name }}">
                    <div class="card-body">
                        <h3>{{ $album->album_name }}</h3>
                        <span>{{ $album->performer }}</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#albumModal{{ $album->id }}">
                        Подробнее
                    </button>
                </div>
            </div>

            <div class="modal fade" id="albumModal{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="albumModalLabel{{ $album->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="albumModalLabel{{ $album->id }}">{{ $album->album_name }}</h5>
                            <button type="button" class="btn btn-info" data-bs-toggle="popover"
                            data-bs-content="{{ $album->description }}">?</button>
                        </div>
                        <div class="modal-body">
                            <p>Исполнитель: {{ $album->performer }}</p>
                            <p>Год выпуска: {{ $album->year_of_release }}</p>
                            <p>Список треков:</p>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Название</th>
                                        <th scope="col">Длина</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($album->tracks as $track)
                                        <tr>
                                            <td>{{ $track->name }}</td>
                                            <td>{{ $track->length }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

     






    </div>

    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="2000">
            <div class="toast-header">
                <i class="fa-solid fa-spinner"></i>
                <strong class="mr-auto">Упс...</strong>
                <button type="button" class="ml-2 mb-1 close" data-bs-dismiss="toast" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Функционал ещё не доступен.
            </div>
        </div>
    </div>

    <!-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa-solid fa-spinner"></i>
                <strong class="me-auto">Упс..</strong>
                <button type="button" class="btn-close" data-bs-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Функционал ещё не доступен.
            </div>
        </div>
    </div> -->


    </div>
    <footer>
        <div class="width-limit">
            <span>Артеев Артём</span>
            <div class="left">
                <a href="https://vk.com/iversy"><img src="https://logodix.com/logo/2174048.png" class="img-fluid"
                        alt="vk"></a>
                <a href="https://t.me/iversy"><img
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftoppng.com%2Fpublic%2Fuploads%2Fpreview%2Ftelegram-icon-telegram-logo-11563072765e0pl0xsrfe.png&f=1&nofb=1&ipt=86bc1779460060a7864cd4bc868a47c90a835fdfaa49a124cae9e6fadb828552&ipo=images"
                        class="img-fluid" alt="telegram"></a>
            </div>
        </div>
    </footer>


</body>

<!-- <script>
    if ("serviceWorker" in navigator) {
        window.addEventListener("load", () => {
            navigator.serviceWorker
                .register("service-worker.js")
                .then((registration) => {
                    console.log("Service Worker registered: ", registration);
                })
                .catch((registrationError) => {
                    console.error("Service Worker registration failed: ", registrationError);
                });
        });
    }
</script> -->

</html>