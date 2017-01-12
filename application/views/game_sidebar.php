
<div class="panel-group" id="accordionNo"> 

  <div class="panel panel-default">

    <div class="panel-heading">

      <h4 class="panel-title"> <a data-toggle="collapse"  href="#collapseThree" class="collapseWill"> チーム <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> </h4>

    </div>

    <div id="collapseThree" class="panel-collapse collapse in">

      <div class="panel-body">
      	<div class="form-group">
          <label for="InputTeamName">ゲームの名前</label>
          <input type="text" class="form-control" name="InputTeamName" id="game_name" placeholder="ゲームの名前">
        </div>

        <div class="form-group">
          <label for="InputTeamName">ゲームの日</label>

          <div class="input-group">
            <input type="text" id="game_date" class="form-control"/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>


        <div class="form-group">
          <label for="InputTeamName">ポジション数</label>
          <input type="text" class="form-control" name="InputTeamName" id="no_positions" placeholder="ポジション数">
        </div>
        <div class="form-group">
            <label for="SeletLevel">カテゴリ </label>
            <select name="SelectLevel" class="form-control" id="category">
                <option value="All">すべて</option>
              	<option value="Men">人々</option>
        				<option value="Women">女性たち</option>
        				<option value="Senior">シニア</option>
        				<option value="Mix">ミックス</option>
        				<option value="Practice">練習</option>
            </select>
        </div>

      </div>

    </div>

  </div>

  <div class="panel panel-default">

    <div class="panel-heading">

      <h4 class="panel-title"> <a data-toggle="collapse"  href="#collapseCategory" class="collapseWill"> <span class="pull-left"> <i class="fa fa-caret-right"></i></span> 場所 </a> </h4>

    </div>

    <div id="collapseCategory" class="panel-collapse collapse in">

      <div class="panel-body smoothscroll maxheight200">

        <label for="SelectPrefecture_find">県 </label>
        <?php echo $location; ?>
      </div>

    </div>

  </div>
</div>
