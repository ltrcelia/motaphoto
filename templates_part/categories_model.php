<div class="categories">

    <div class="left-categories">
            <select id="select-categories" class="selection">
                <option value="">catégorie</option>
                <?php $terms = get_terms(array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => false,
                )); 
                foreach ($terms as $term) : ?>
                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach; ?>
            </select>           
            <select id="select-formats" class="selection">
                <option value="">formats</option>
                <?php $terms = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                ));
                foreach ($terms as $term) : ?>
                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach; ?>
            </select>
    </div>

    <div class="right-categories">
            <select id="selectCustomField" class="selection">
                <option value="">trier par</option>
                <option value="DESC">plus récentes</option>
                <option value="ASC">plus anciennes</option>
            </select>
    </div>
    
</div>