@extends('home')

@section('content')

{{--    <div class='pricing pricing-palden'>--}}
{{--        <h4></h4>--}}
{{--        <div class='pricing-item mx-2'>--}}
{{--            <div class='pricing-deco'>--}}
{{--                <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>--}}
{{--          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>--}}
{{--                    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>--}}
{{--                    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>--}}
{{--                    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>--}}
{{--        </svg>--}}
{{--                <div class='pricing-price'><span class='pricing-currency'></span>4/4--}}
{{--                    <span class='pricing-period'>занятий</span>--}}
{{--                </div>--}}
{{--                <h3 class='pricing-title'>Программирвание</h3>--}}
{{--            </div>--}}
{{--            <p>Сосотояние: Активен</p>--}}
{{--            <button class='pricing-action'>Узнать больше</button>--}}
{{--        </div>--}}
{{--        <div class='pricing-item mx-2'>--}}
{{--            <div class='pricing-deco'>--}}
{{--                <svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>--}}
{{--          <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>--}}
{{--                    <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>--}}
{{--                    <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>--}}
{{--                    <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>--}}
{{--        </svg>--}}
{{--                <div class='pricing-price'><span class='pricing-currency'></span>5/12--}}
{{--                    <span class='pricing-period'>занятий</span>--}}
{{--                </div>--}}
{{--                <h3 class='pricing-title'>Робототехника</h3>--}}
{{--            </div>--}}
{{--            <button class='pricing-action'>Узнать больше</button>--}}
{{--        </div>--}}

{{--        <div class="pricing-item mx-2">--}}
{{--            <a style="display: block; width: 100%; height: 100%; font-size: 15rem;" href="{{ route('product.choose', Auth::user()) }}">--}}
{{--                +--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="card shadow-lg m-2 m-md-5 border-bottom-primary">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Список предметов</h5>
            <a href="{{ route('product.choose', Auth::user()) }}" class="btn btn-success">Добавить курс</a>
        </div>
        <div class="row my-4 px-4">
            @foreach(Auth::user()->orders as $order)
                <div class="col-xl-4 col-lg-6 mb-4">
                    <div class="bg-white rounded-lg p-5 shadow info-card">
                        <p class="my-2 text-center">{{ $order->student->name }}</p>
                        <h2 class="h6 font-weight-bold text-center mb-4">{{ $order->product->name }}</h2>


                        <!-- Progress bar 1 -->
                        <div class="progress mx-auto" data-value='{{ $order->timeLeftPercent() }}'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
                            <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">{{ $order->timeLeftPercent() }}<sup class="small">%</sup></div>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- Demo info -->
                        @if($order->active == 1)
                            <div class="row text-center mt-4">
                                <div class="col-6 border-right">
                                    <div class="font-weight-bold text-success mb-0">Активен</div><span class="small text-gray">Состояние</span>
                                </div>
                                <div class="col-6">
                                    <div class="font-weight-bold text-primary mb-0">{{ $order->product->count * 4 * $order->product->period - $order->countLeft() }} / {{ $order->product->count * 4 * $order->product->period }}</div><span class="small text-gray">Осталось занятий</span>
                                </div>
                            </div>
                        @elseif($order->paid && $order->active != -1)
                            <div class="row text-center mt-4">
                                <div class="col-6 border-right">
                                    <div class="font-weight-bold text-success mb-0">Оплачено</div><span class="small text-gray">Состояние</span>
                                </div>
                                <div class="col-6">
                                    <div class="font-weight-bold text-warning mb-0">Обрабатывается</div><span class="small text-gray">Состояние</span>
                                </div>
                            </div>
                        @elseif($order->active == -1)
                            <div class="row text-center mt-4">
                                <div class="col-6 border-right">
                                    <div class="font-weight-bold text-danger mb-0">Просрочено</div><span class="small text-gray">Состояние</span>
                                </div>
                                <div class="col-6">
                                    <div class="font-weight-bold text-primary mb-0">{{ $order->product->price }} &#8381;</div><span class="small text-gray">К оплате</span>
                                </div>
                                <div class="col-12 mt-2">
                                    <a class="text-decoration-none" href="{{ route('pay.page', $order->id) }}">Продлить</a>
                                </div>
                            </div>
                        @else
                            <button type="button" class="close closeCard" onclick="delOrder({{$order->id}})">
                                <span>&times;</span>
                            </button>
                            <div class="row text-center mt-4">
                                <div class="col-6 border-right">
                                    <div class="font-weight-bold text-danger mb-0">Не оплачено</div><span class="small text-gray">Состояние</span>
                                </div>
                                <div class="col-6">
                                    <div class="font-weight-bold text-primary mb-0">{{ $order->product->price }} &#8381;</div><span class="small text-gray">К оплате</span>
                                </div>
                                <div class="col-12 mt-2">
                                    <a class="text-decoration-none" href="{{ route('pay.page', $order->id) }}">Оплатить</a>
                                </div>
                            </div>
                    @endif

                    <!-- END -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="m-2 m-md-5">
        <students-component></students-component>
    </div>


@endsection

@section('script')
    <script>
        function delOrder(orderId) {
            swal.fire({
                title: 'Удаление предмета!',
                text: "Вы уверены что хотите удалить предмет!?",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Да, удалить!'
            }).then((result) => {
                console.log(result.value)
                if (result.value) {
                    axios.delete('/delete/order/' + orderId)
                    .then(response => {
                        console.log(response);
                        swal.fire(
                            'Удалено!',
                            'Удаление проведено успешно!',
                            'success'
                        );
                        location.reload()
                    })
                    .catch(e => {
                        console.warn(e)
                    });
                }
            });
        }
    </script>
@endsection
