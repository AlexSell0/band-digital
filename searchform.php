<!-- Подключаем форму поиска -->
<div class="search">
    <div class="form-group">
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
            <input type="text" placeholder="поиск" class="form-control" <?php echo get_search_query() ?>" name="s" id="s" />
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>