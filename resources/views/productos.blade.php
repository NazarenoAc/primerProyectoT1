@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="text-white">Productos Electrónicos</h1>
            <p class="text-light">Elige tu próximo dispositivo con las mejores ofertas y tecnología de vanguardia.</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/hQqyKoMen0Er1pUowGDd0nU6pjNfLBGNTFiBuN06pYU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YW5kcm9pZGhlYWRs/aW5lcy5jb20vd3At/Y29udGVudC91cGxv/YWRzLzIwMjUvMDEv/U2Ftc3VuZy1HYWxh/eHktUzI1LW9mZmlj/aWFsLXJlbmRlci0x/LTE0MjB4MTQyMC53/ZWJw') }}" class="card-img-top object-fit-cover" alt="Smartphone Samsung Galaxy S25">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartphone Samsung Galaxy S25</h5>
                    <p class="card-text text-secondary flex-grow-1">El Samsung Galaxy S25 combina potencia y elegancia con una pantalla AMOLED vibrante, alto rendimiento y cámaras avanzadas para capturar cada momento con calidad. Ideal para uso diario, entretenimiento y fotografía..</p>
                     <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/rzB8bbLCfu9mEVCMg9Pk_n7d5giPtbJcxNeUi4fvGdY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFYdkhPdjQ0ZEwu/anBn') }}" class="card-img-top object-fit-cover" alt="Auriculares Wireless JBL Vibe buds 2">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Auriculares Wireless JBL Quantum</h5>
                    <p class="card-text text-secondary flex-grow-1">Sonido envolvente con cancelación activa de ruido, hasta 30 horas de batería y conexión Bluetooth 5.2.</p>
                     <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/tsBSTcTbgkxEU0q-i0wr7HV0p0VikKvtyxGKsuLHF6U/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9odHRw/Mi5tbHN0YXRpYy5j/b20vRF9RX05QXzJY/XzkwNDM0MS1NTEIx/MDU5MDA1ODc5Mzhf/MDIyMDI2LUUud2Vi/cA') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Smartwatch Pro</h5>
                    <p class="card-text text-secondary flex-grow-1">Monitor de salud 24/7, GPS integrado, resistencia al agua y notificaciones inteligentes.</p>
                     <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/8H7RHXxY1_EHcTWlk_SplVeltO_7UcFDu8yJVxXsXR8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/c2hvcGlmeS5jb20v/cy9maWxlcy8xLzA1/NjEvODM0NS81OTAx/L2ZpbGVzL2tmLTMt/aHlwZXJ4LWNsb3Vk/LWFscGhhLmpwZw') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Auriculares HyperX Alpha III</h5>
                    <p class="card-text text-secondary flex-grow-1">Auriculares gaming con sonido envolvente, micrófono ajustable y diseño ergonómico para un uso prolongado.</p>
                    <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/HryRZQqpUGfTzTtUgLg957tYH-sJzacJ-WzW338dpEg/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9jZG4u/aWRlYWxvLmNvbS9m/b2xkZXIvUHJvZHVj/dC8yMDYwNDMvNy8y/MDYwNDM3MTEvczFf/cHJvZHVrdGJpbGRf/Z3Jvc3MvYXBwbGUt/bWFjYm9vay1haXIt/MTMtMjAyNS1tNC5q/cGc') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">MacBook Air 2025</h5>
                    <p class="card-text text-secondary flex-grow-1">Potente procesador Apple, pantalla Retina, batería de larga duración y diseño elegante. Ideal para programar</p>
                     <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/3GUyVG79yRlOwgoFFUAvAH117Phqg7E1CJ6vGjDBd8k/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YXBwbGUuY29tL25l/d3Nyb29tL2ltYWdl/cy8yMDIzLzA5L2Fw/cGxlLXVudmVpbHMt/aXBob25lLTE1LXBy/by1hbmQtaXBob25l/LTE1LXByby1tYXgv/YXJ0aWNsZS9BcHBs/ZS1pUGhvbmUtMTUt/UHJvLWxpbmV1cC1o/ZXJvLTIzMDkxMl9G/dWxsLUJsZWVkLUlt/YWdlLmpwZy5sYXJn/ZS5qcGc') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Iphone 15 Pro Max 256GB</h5>
                    <p class="card-text text-secondary flex-grow-1">Pantalla Super Retina XDR, procesador A17 Pro, cámara triple y sistema de protección contra agua y polvo.</p>
                    <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/QyscgCQq9jMGghemKuiQ0KwdhZARy7t38oTLeaudOIU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tYWdu/b2xpYXB1YmxpYzIu/bmV3c2FuLmNvbS5h/ci8uaW1hZ2luZy9t/dGUvb3B0aW1pemF0/aW9uLXRoZW1lLzEy/ODAvZGFtL2RhbS1l/bGVjdHJvbmljYS9u/b2JsZXgvaW1hZ2Vu/L2Rpc3BsYXlzL2xl/ZC9PVFJPUy9zbWFy/dC00ay9EVjU1WDg1/ODAvUE9QVFZfRFZf/U2luQUZBMjAyNV9O/T0JMRVhfVjFfRFY1/NVg4NTgwLmpwZy9q/Y3I6Y29udGVudC9Q/T1BUVl9EVl9TaW5B/RkEyMDI1X05PQkxF/WF9WMV9EVjU1WDg1/ODAuanBn') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Televisor 55" 4K Ultra HD Noblex</h5>
                    <p class="card-text text-secondary flex-grow-1">Pantalla 4K Ultra HD, sistema de sonido Dolby Atmos y conectividad inteligente.</p>
                    <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card product-card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/v7u8N5iNgZznCPAx3nfjF4FHkSRFiCxYT-zMeUqY-kg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9odHRw/Mi5tbHN0YXRpYy5j/b20vRF9RX05QXzJY/Xzc1MjE1NC1DQlQ4/OTQzMTc0MzEwOF8w/ODIwMjUtVi53ZWJw') }}" class="card-img-top object-fit-cover" alt=" Smartwatch Xiaomi Redmi Watch 5 Active Preto Original">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Notebook ASUS Zenbook </h5>
                    <p class="card-text text-secondary flex-grow-1">Procesador Intel Core i7, GPU NVIDIA GeForce RTX 3080, 16GB de RAM y 1TB de almacenamiento SSD.</p>
                     <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge bg-warning text-dark fs-6">$1500</span>
    <a href="#" class="btn  btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                    <img src="{{ asset('https://imgs.search.brave.com/kSwhkF5ju7huZZeKBLvY4_BwkVqTThp1yLElDIKl_88/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9oYXJk/Y29yZWNvbXB1dGFj/aW9uLmNvbS5hci93/cC1jb250ZW50L3Vw/bG9hZHMvMjAxOC8w/NS8xNDg4ODc3NjQ3/LmpwZw') }}" class="card-img-top object-fit-cover" alt=" Monitor BENQ 240HZ ZOWIE">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Monitor BENQ 240HZ ZOWIE</h5>
                    <p class="card-text text-secondary flex-grow-1">Monitor de 24 pulgadas con tasa de refresco de 240Hz, ideal para gaming.</p>
                    <div class="mt-3 d-flex align-items-center w-100">
    <span class="badge text-dark fs-6">$1500</span>
    <a href="#" class="btn btn-sm ms-auto">Agregar al carrito</a>
</div>
                </div>
            </div>
        </div>
    </div>
@endsection

