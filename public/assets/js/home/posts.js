hljs.highlightAll();

// 文章响应式图片 获取文章所有图片
var allImages = document.querySelectorAll('#post img');

// 循环遍历每个图片
allImages.forEach(function (image) {
    // 获取文本框的宽度
    var textBoxWidth = document.getElementById('post').clientWidth;

    // 获取图片宽度
    var imageWidth = image.clientWidth;
    // 检查是否超出文本框的宽度
    if (imageWidth > textBoxWidth) {
        image.style.width = '100%';
        image.style.height = 'auto';
    }
})
// 文章响应式图片 end

 // 刚开始把提示框设置为隐藏
 $('#alert').css('display', 'none')
 $('#alert1').css('display', 'none')

 // 文章点赞请求
 function likeRequest(postId) {
     $.ajax({
         url: "{{ url('home/like_request') }}/" + postId,
         type: "GET",
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function (data) {
             // 更新点赞数量显示
             $('#likeCount' + postId).text(data.newLikeCount);

         },
         error: function () {
             // 处理错误
             $('#alert').removeAttr('style')
         }
     });
 }

 // 文章点赞请求 end

 // 文章浏览量+1
 $(document).ready(function () {
     var PostId = $('#post').data('post-id');

     // 调用增加浏览次数的函数
     increaseViewCount(PostId);

     function increaseViewCount(PostId) {
         $.ajax({
             url: "{{ url('home/increaseViewCount') }}/" + PostId,
             type: "GET",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function (data) {
                 // 更新浏览次数显示
                 $('.posts-view .ii').text(data.NewViewCount);
             },
             error: function () {
                 // 处理错误
                 console.log('浏览次数增加失败')
             }
         });
     }
 })
 // 文章浏览量+1 end

 // 文章评论
 $('.btn-icon-only').click(function () {
     var PostID = $('#post').data('post-id');
     var commentText = $('.textarea-autosize').val();

     var postData = {
         PostID: PostID,
         comment: commentText,
     }

     $.ajax({
         url: "{{ url('home/PostComment') }}/" + PostID,
         type: "POST",
         data: postData,
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function (data) {
             // 显示新的评论
             location.reload();
         },
         error: function () {
             // 处理错误
             $('#alert1').removeAttr('style')
         }
     });
 })
 // 文章评论 end

 //查看更多评论
 //获取“查看剩下的全部评论”按钮
 var loadMoreButton = document.getElementById('loadMore');
 if (loadMoreButton) {
     // 给按钮添加点击事件
     loadMoreButton.addEventListener('click', function () {
         // 隐藏按钮
         loadMoreButton.style.display = 'none';
         var PostID = $('#post').data('post-id');
         $.ajax({
             url: "{{ url('home/loadMore') }}/" + PostID,
             type: 'POST',
             data: PostID,
             dataType: 'json',
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function (data) {
                 // 循环遍历获取到的评论数据，并将每条评论添加到页面中
                 data.comment.forEach(function (item) {
                     var avatar = item.avatar
                     // 对每个created_at 字符串都调用格式化函数
                     var formattedDateString = formatDateString(item.created_at)
                     var newCommentHtml = `
     <a href="#" class="list-group-item list-group-item-action d-flex align-items-center comment-item" onclick="return false;">
         <div class="list-group-img">
             <img class="avatar bg-purple" src="{{ URL::asset('uploads/' . '${avatar}') }}" alt="用户头像">
         </div>
         <div class="list-group-content">
             <div class="list-group-heading"><b>${item.username}</b> <small>${formattedDateString}</small></div>
             <div class="list-group-heading">${item.content}</div>
         </div>
     </a>
 `;
                     // 将新的评论添加到页面中
                     $('.list-group').append(newCommentHtml);
                 });
             },
             error: function () {

             }

         })
     });
 } else {
     console.log('暂时没有评论')
 }


 function formatDateString(dateString) {
     var date = new Date(dateString); // 创建 Date 对象
     // 获取年、月、日、时、分、秒
     var year = date.getFullYear();
     var month = ("0" + (date.getMonth() + 1)).slice(-2);
     var day = ("0" + date.getDate()).slice(-2);
     var hours = ("0" + date.getHours()).slice(-2);
     var minutes = ("0" + date.getMinutes()).slice(-2);
     var seconds = ("0" + date.getSeconds()).slice(-2);

     // 格式化日期字符串为 YYYY-MM-DD HH:MM:SS 格式
     var formattedDateString = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;

     return formattedDateString;
 }

 //掩藏按钮jq写法
 // $('#loadMore').click(function () {
 //     $(this).hide();
 // })
 //查看更多评论 end