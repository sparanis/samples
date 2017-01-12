<div class="panel-group" id="accordionNo"> 

  <div class="panel panel-default">

    <div class="panel-heading">

      <h4 class="panel-title"> <a data-toggle="collapse"  href="#collapseThree" class="collapseWill"> Team <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> </h4>

    </div>

    <div id="collapseThree" class="panel-collapse collapse in">

      <div class="panel-body">
        <div class="form-group">
          <label for="InputTeamName">Keyword</label>
          <input type="text" class="form-control" name="InputTeamName" id="keyword" placeholder="Team Name">
        </div>
        <div class="form-group">
            <label for="SeletLevel">Level </label>
            <select name="SelectLevel" class="form-control" id="level">
              <option value="All">All</option>
              <option value="Beginner">Beginner</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Excellent">Excellent</option>
            </select>
        </div>

      </div>

    </div>

  </div>

  <div class="panel panel-default">

    <div class="panel-heading">

      <h4 class="panel-title"> <a data-toggle="collapse"  href="#collapseCategory" class="collapseWill"> <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Location </a> </h4>

    </div>

    <div id="collapseCategory" class="panel-collapse collapse in">

      <div class="panel-body smoothscroll maxheight500">

        <label for="SelectPrefecture_find">Prefecture </label>
        <?php echo $location; ?>
      </div>

    </div>

  </div>
</div>