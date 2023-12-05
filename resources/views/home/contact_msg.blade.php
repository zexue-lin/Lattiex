{{--设置token -- ajax请求必须需要--}}
<meta name="csrf-token" content="{{csrf_token()}}">

{{--页面独立的css文件--}}
@push('css')
    <link rel="stylesheet" href="{{URL::asset('assets/css/home.css')}}">
@endpush

<div class="card-box">
    @foreach($message as $cont)
        <div class="card-contact col-lg-12">
            <div class="comments">
                <div class="comment-react">
                    <button class="incrementButton" data-contact-id="{{$cont->id}}">
                        <svg fill="none" viewBox="0 0 24 24" height="16" width="16"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill="#707277" stroke-linecap="round" stroke-width="2"
                                  stroke="#707277"
                                  d="M19.4626 3.99415C16.7809 2.34923 14.4404 3.01211 13.0344 4.06801C12.4578 4.50096 12.1696 4.71743 12 4.71743C11.8304 4.71743 11.5422 4.50096 10.9656 4.06801C9.55962 3.01211 7.21909 2.34923 4.53744 3.99415C1.01807 6.15294 0.221721 13.2749 8.33953 19.2834C9.88572 20.4278 10.6588 21 12 21C13.3412 21 14.1143 20.4278 15.6605 19.2834C23.7783 13.2749 22.9819 6.15294 19.4626 3.99415Z"></path>
                        </svg>
                    </button>
                    <hr>
                    <span id="count{{$cont->id}}">{{$cont->like}}</span>
                </div>
                <div class="comment-container">
                    <div class="user">
                        <div class="user-pic">
                            <svg fill="none" viewBox="0 0 24 24" height="20" width="20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linejoin="round" fill="#707277"
                                      stroke-linecap="round"
                                      stroke-width="2" stroke="#707277"
                                      d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"></path>
                                <path stroke-width="2" fill="#707277" stroke="#707277"
                                      d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"></path>
                            </svg>
                        </div>
                        <div class="user-info">
                            <span>{{$cont->name}}</span>
                            <p>{{$cont->created_at}}</p>
                        </div>
                    </div>
                    <p class="comment-content">
                        {{$cont->content}}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('script')
    <script>
        // 为按钮添加点击事件
        $('.incrementButton').click(function () {
            // $(this)  => 表示当前被点击的按钮
            // data('message-id')是jQuery的方法，用于获取元素以data开头的属性的值，
            // 此处14行设置了 <button class="incrementButton" data-message-id=>

            var contactId = $(this).data('contact-id');

            // 发起AJAX请求，向后端发送数据更新请求
            $.ajax({
                url: "{{url('home/contact_like')}}/" + contactId, // 后端路由
                method: 'POST',
                data: {contactId: contactId}, // 传递文章的ID或标识
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    // 更新页面上的点赞数
                    $('#count' + contactId).text(data.LikeCount);
                },
                error: function () {
                    // 处理错误
                    console.log('无需重复点赞！')
                    // $('#alert').removeAttr('style')
                }
            })
        })


    </script>
@endpush
