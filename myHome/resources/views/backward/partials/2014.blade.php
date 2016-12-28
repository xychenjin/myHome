<div class="div-2014 form-group">
    <p>
        那一年，我大四，大学毕业<br>
        总结四年的大学生活，没什么可以留恋的，唯一值得一提的是，毕业时拍的半身照很帅<br>

        7月份，亲爱的她陪我去面试，后来应聘上了，在这家公司开始了我职业生涯的第一份工作，我是一名PHP程序员，但在公司，
        网站开始的所有的事，都要亲自去做，前后端，配装服务器...
    </p>

    <div class="row text-center">
        {!! link_to_route('backward.detail', '上一年', ['y'=>$y-1 ], []) !!}
        &nbsp;
        {!! link_to_route('backward.detail', '下一年', ['y'=>$y+1 ], []) !!}
    </div>
</div>
