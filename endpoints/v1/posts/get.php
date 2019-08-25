<?php return function (array $parameters): array {

    // https://developer.mozilla.org/en-US/docs/Web/HTML/Element

    /**
     * <h2>Meine UÜberschrift</h2>
     * <p>Willkommen beim Blog. Dies ist dein erster Beitrag. Bearbeite oder lösche ihn und beginne mit dem Schreiben!</p>
     * <figure class="wp-block-image is-resized">
     *   <img src="http://localhost/wp-content/uploads/2019/08/13864946.png" alt="" class="wp-image-5" width="321" height="321"/>
     *   <figcaption>Who is the best</figcaption>
     * </figure>
     * <p>Tolle neue <strong>Sa</strong>che hier.</p>
     * <ul>
     *   <li>Eier</li>
     *   <li>Mais
     *     <ul>
     *       <li>Erdbeeren</li>
     *     </ul>
     *   </li>
     * </ul>
     */

    $posts = [];
    $posts['content'][] = [
        'tag' => 'h2',
        'content' => [
            'Meine Überschrift'
        ]
    ];

    $posts['content'][] = [
        'tag' => 'p',
        'content' => [
            'Willkommen beim Blog. Dies ist dein erster Beitrag. Bearbeite oder lösche ihn und beginne mit dem Schreiben!'
        ]
    ];

    $image = [
        'tag' => 'img',
        'src' => 'http://localhost/wp-content/uploads/2019/08/13864946.png',
        'alt' => '',
        'width' => '321',
        'height' => '321'
    ];

    $figcaption = [
        'tag' => 'figcaption',
        'content' => [
            'Who is the best'
        ]
    ];

    $posts['content'][] = [
        'tag' => 'figure',
        'children' => [
            $image,
            $figcaption
        ]
    ];

    $strong = [
        'tag' => 'strong',
        'content' => 'Sa'
    ];

    $posts['content'][] = [
        'tag' => 'p',
        'content' => [
            'Tolle neue ',
            $strong,
            'che hier.'
        ]
    ];

    $element1b = [
        'tag' => 'li',
        'Erdbeeren'
    ];

    $sublist = [
        'tag' => 'ol',
        'children' => [
            $element1b
        ]
    ];

    $element1 = [
        'tag' => 'li',
        'text' => 'Eier'
    ];

    $element2 = [
        'tag' => 'li',
        'text' => 'Mais',
        'child' => $sublist
    ];

    $posts['content'][] = [
        'tag' => 'ul',
        'children' => [
            $element1,
            $element2
        ]
    ];

    return $posts;
};