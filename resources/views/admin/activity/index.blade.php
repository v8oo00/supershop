@extends('layouts.admin')

@section('css')
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Browse<small>HomeUsers</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>

                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  Show the information of foreground users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>活动名称</th>
                      <th>活动规则</th>
                      <th >活动宣传图</th>
                      <th>活动地址</th>
                      <th>活动开始时间</th>
                      <th>活动结束时间</th>
                      <th>活动操作</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in items">


                      @foreach($activitys as $activity)
                        <tr>
                        <td>{{$activity->id}}</td>
                        <td>{{$activity->name}}</td>
                        <td>{{$activity->rule}}</td>
                        <td style='text-align:center;'>
                            <button type="button" name="button" img-src='{{$activity->image}}' class='btn btn-defaut btn-xs pigimg'>点击查看图片</button>
                        </td>
                        <td>{{$activity->route}}</td>
                        <td>{{$activity->start_time}}</td>
                        <td>{{$activity->end_time}}</td>
                        <td>
                            删除|修改
                        </td>

                    </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;">
    <div id="innerdiv" style="position:absolute;">
        <img id="bigimg" style="border:5px solid #fff;" src="" />
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$(".pigimg").click(function(){
    var _this = $(this);
    imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
});

function imgShow(outerdiv, innerdiv, bigimg, _this){
    var src = _this.attr("img-src");
    $(bigimg).attr("src", src);


    $("<img/>").attr("src", src).load(function(){
        var windowW = $(window).width();
        var windowH = $(window).height();
        var realWidth = this.width;
        var realHeight = this.height;
        var imgWidth, imgHeight;
        var scale = 0.8;

        if(realHeight>windowH*scale) {
            imgHeight = windowH*scale;
            imgWidth = imgHeight/realHeight*realWidth;
            if(imgWidth>windowW*scale) {
                imgWidth = windowW*scale;
            }
        } else if(realWidth>windowW*scale) {
            imgWidth = windowW*scale;
                        imgHeight = imgWidth/realWidth*realHeight;
        } else {
            imgWidth = realWidth;
            imgHeight = realHeight;
        }
                $(bigimg).css("width",imgWidth);

        var w = (windowW-imgWidth)/2;
        var h = (windowH-imgHeight)/2;
        $(innerdiv).css({"top":h, "left":w});
        $(outerdiv).fadeIn("fast");
    });

    $(outerdiv).click(function(){
        $(this).fadeOut("fast");
    });
}

</script>

@endsection
