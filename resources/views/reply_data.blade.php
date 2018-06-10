@foreach($question_replies as $question_reply)
<ul class="comments-list reply-list" id="reply">
    <li>

        <div class="comment-avatar"><img src="{{ asset('images/') }}/{{get_userimage($question_reply->userid)}}" alt=""></div>

        <div class="comment-box">
            <div class="comment-head">
                <h6 class="comment-name">{{ get_username($question_reply->userid) }}</h6>
                <i class="fa fa-eye" style="font-size: 16px"></i>
            </div>
            <div class="comment-content">
                {{ $question_reply->reply }}
                <div class="comment-open">
                    <a class="btn-reply">
                    </a>
                </div>
            </div>
            <div class="comment-footer">
                <div class="comment-form">
                    <textarea class="form-control" name="" id=""></textarea>

                    <div class="pull-right send-button">
                        <a class="btn-send">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </li>

</ul>
@endforeach