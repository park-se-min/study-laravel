<div class="form-group {{ $errors->has('title') ?'asdf' : '' }}">
	<input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="form-control">
	{!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group">
	<label for="my-dropzone">파일</label>
	<div id="my-dropzone" class="dropzone"></div>
</div>

<textarea name="content" id="content" rows=10 class="form-control">{{ old('content', $article->content) }}</textarea>
{!! $errors->first('content', '<span class="form-error">:message</span>') !!}



@section('script')
  @parent
  <script>
	  alert(1);
    var form = $('form')[1]
    //   dropzone  = $('div.dropzone'),
    //   dzControl = $('label[for=my-dropzone]>small');

    // /* Dropzone */
	// Dropzone.autoDiscover = false;

    // 드롭존 인스턴스 생성.
    var myDropzone = new Dropzone('div#my-dropzone', {
      url: '/attachments',
      paramName: 'files',
      maxFilesize: 3,
      acceptedFiles: '.jpg,.png,.zip,.tar',
      uploadMultiple: true,
      params: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        article_id: '{{ $article->id }}'
      },
      dictDefaultMessage: '<div class="text-center text-muted">' +
        "<h2>끌어다 놓으세요!</h2>" +
        "<p>클릭도 가능</p></div>",
      dictFileTooBig: "최대크기는 3MB임",
      dictInvalidFileType: '이미지 파일만 가능',
      addRemoveLinks: true
	});

    // 파일 업로드 성공 이벤트 리스너.
    myDropzone.on('successmultiple', function(file, data) {
      for (var i= 0,len=data.length; i<len; i++) {
		  $('<input>', {
			  type:"text",
			  name:"attachments[]",
			  value:data[i].id
		  }).appendTo(form);
        // // 책에 있는 'attachments[]' 숨은 필드 추가 로직을 별도 메서드로 추출했다.
        // handleFormElement(data[i].id);

        // // 책에 없는 내용
        // // 성공한 파일 애트리뷰트를 파일 인스턴스에 추가
        // file[i]._id = data[i].id;
        // file[i]._name = data[i].filename;
        // file[i]._url = data[i].url;

        // // 책에 없는 내용
        // // 이미 파일일 경우 handleContent() 호출.
        // if (/^image/.test(data[i].mime)) {
        //   handleContent('content', data[i].url);
        // }
      }
    });

    // // 파일 삭제 이벤트 리스너.
    // myDropzone.on('removedfile', function(file) {
    //   // 사용자가 이미지를 삭제하면 UI의 DOM 레벨에서 사라진다.
    //   // 서버에서도 삭제해야 하므로 Ajax 요청한다.
    //   $.ajax({
    //     type: 'DELETE',
    //     url: '/attachments/' + file._id
    //   }).then(function(data) {
    //     handleFormElement(data.id, true);

    //     if (/^image/.test(data.mime)) {
    //       handleContent('content', data.url, true);
    //     }
    //   })
    // });

    // // 'attachments[]' 숨은 필드를 만들거나 제거한다.
    // var handleFormElement = function(id, remove) {
    //   if (remove) {
    //     $('input[name="attachments[]"][value="'+id+'"]').remove();

    //     return;
    //   }

    //   $('<input>', {
    //     type: 'hidden',
    //     name: 'attachments[]',
    //     value: id
    //   }).appendTo(form);
    // }

    // // 컨텐트 영역의 캐럿 위치에 이미지 마크다운을 삽입한다.
    // var handleContent = function(objId, imgUrl, remove) {
    //   var caretPos = document.getElementById(objId).selectionStart;
    //   var content = $('#' + objId).val();
    //   var imgMarkdown = '![](' + imgUrl + ')';

    //   if (remove) {
    //     $('#' + objId).val(
    //       content.replace(imgMarkdown, '')
    //     );

    //     return;
    //   }

    //   $('#' + objId).val(
    //     content.substring(0, caretPos) +
    //     imgMarkdown + '\n' +
    //     content.substring(caretPos)
    //   );
    // };

    // // 드롭존의 가시성을 토글한다.
    // dzControl.on('click', function(e) {
    //   dropzone.fadeToggle(0);
    //   dzControl.fadeToggle(0);
    // });

    // /* select2 */
    // $('#tags').select2({
    //   placeholder: '{{ trans('forum.articles.s2_select') }}',
    //   maximumSelectionLength: 3
    // });

    // /* 이메일 알림 체크박스 조작 */
    // var notifyElem = $('input[name="notification"]');

    // notifyElem.on('click', function (e) {
    //   var self = $(this),
    //       turnOn = self.val() ? false : true;

    //   if (turnOn) {
    //     self.val(1);
    //     self.attr('checked', 'checked');
    //   } else {
    //     self.removeAttr('value');
    //     self.removeAttr('checked');
    //   }
    // });

    // if (Laravel.currentRouteName == 'articles.create') {
    //   notifyElem.val(1);
    // }

    // if (notifyElem.val()) {
    //   notifyElem.attr('checked', 'checked');
    // }
  </script>
@stop
