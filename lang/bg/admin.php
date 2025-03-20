<?php
return [
    'home' => [
        'titles' => [
            'page' => 'Табло <small>отчет и статистика</small>',
            'menu' => 'Табло',
            'list' => '',
            'create' => '',
            'edit' => ''
        ],
        'title' => 'Табло'
    ],

    // Модули
    'users' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Потребители | Списък',
                'content_header_title' => 'Потребители',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица на потребителите'
            ],
            'create' => [
                'subtitle' => 'Потребители | Създаване',
                'content_header_title' => 'Потребители',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на потребител'
            ],
            'show' => [
                'subtitle' => 'Потребители | Преглед',
                'content_header_title' => 'Потребители',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на потребител'
            ],
            'edit' => [
                'subtitle' => 'Потребители | Редактиране',
                'content_header_title' => 'Потребители',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на потребител',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на потребители',
            'content_header_subtitle' => 'създаване, актуализиране, изтриване и др.',
            'menu' => 'Потребители',
            'list' => 'Таблица на потребителите',
            'create' => 'Създаване на потребител',
            'edit' => 'Редактиране на потребител',
            'show' => 'Преглед на потребител',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ИД',
                'placeholder' => 'Изберете потребител'
            ],
            'name' => [
                'title' => 'Име',
                'placeholder' => 'Йон Доу'
            ],
            'email' => [
                'title' => 'Имейл',
                'placeholder' => 'john@example.com'
            ],
            'phone' => [
                'title' => 'Телефон',
                'placeholder' => '+395 8XX XXX XXX'
            ],
            'password' => [
                'title' => 'Парола',
                'placeholder' => ''
            ],
            'confirm_password' => [
                'title' => 'Потвърдете паролата',
                'placeholder' => ''
            ],
            'email_verified_at' => [
                'title' => 'Имейл потвърден на',
                'placeholder' => 'Изберете дата'
            ],
            'created_at' => [
                'title' => 'Създаден на',
                'placeholder' => 'Изберете дата'
            ],
            'updated_at' => [
                'title' => 'Актуализиран на',
                'placeholder' => 'Изберете дата'
            ],
        ]
    ],

    'roles' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Роли | Списък',
                'content_header_title' => 'Роли',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица на ролите'
            ],
            'create' => [
                'subtitle' => 'Роли | Създаване',
                'content_header_title' => 'Роли',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на роля'
            ],
            'show' => [
                'subtitle' => 'Роли | Преглед',
                'content_header_title' => 'Роли',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на роля'
            ],
            'edit' => [
                'subtitle' => 'Роли | Редактиране',
                'content_header_title' => 'Роли',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на роля',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на роли',
            'content_header_subtitle' => 'създаване, актуализиране, изтриване и др.',
            'menu' => 'Роли',
            'list' => 'Таблица на ролите',
            'create' => 'Създаване на роля',
            'edit' => 'Редактиране на роля',
            'show' => 'Преглед на роля',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ИД',
                'placeholder' => 'Изберете роля'
            ],
            'name' => [
                'title' => 'Име',
                'placeholder' => 'Супер админ'
            ],
            'slug' => [
                'title' => 'Слаг',
                'placeholder' => 'super-admin'
            ],
            'created_at' => [
                'title' => 'Създаден на',
                'placeholder' => 'Изберете дата'
            ],
            'updated_at' => [
                'title' => 'Актуализиран на',
                'placeholder' => 'Изберете дата'
            ],
        ]
    ],

    'categories' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Категория | Списък',
                'content_header_title' => 'Категория',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица на категориите'
            ],
            'create' => [
                'subtitle' => 'Категория | Създаване',
                'content_header_title' => 'Категория',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на категория'
            ],
            'show' => [
                'subtitle' => 'Категория | Преглед',
                'content_header_title' => 'Категория',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на категория'
            ],
            'edit' => [
                'subtitle' => 'Категория | Редактиране',
                'content_header_title' => 'Категория',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на категория',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на категория',
            'content_header_subtitle' => 'създаване, актуализиране, изтриване и др.',
            'menu' => 'Категория',
            'list' => 'Таблица на категориите',
            'create' => 'Създаване на категория',
            'edit' => 'Редактиране на категория',
            'show' => 'Преглед на категория',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ИД',
                'placeholder' => 'Изберете категория'
            ],
            'parent_id' => [
                'title' => 'Родителска категория',
                'placeholder' => 'Изберете родител'
            ],
            'name' => [
                'title' => 'Име',
                'placeholder' => 'Име на категорията'
            ],
            'slug' => [
                'title' => 'Слаг',
                'placeholder' => 'Слаг'
            ],
            'image' => [
                'title' => 'Снимка',
                'placeholder' => 'Снимка'
            ],
            'created_at' => [
                'title' => 'Създаден на',
                'placeholder' => 'Изберете дата'
            ],
            'updated_at' => [
                'title' => 'Актуализиран на',
                'placeholder' => 'Изберете дата'
            ],
        ]
    ],

    'products' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Продукт | Списък',
                'content_header_title' => 'Продукт',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица на продуктите'
            ],
            'create' => [
                'subtitle' => 'Продукт | Създаване',
                'content_header_title' => 'Продукт',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на продукт'
            ],
            'show' => [
                'subtitle' => 'Продукт | Преглед',
                'content_header_title' => 'Продукт',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на продукт'
            ],
            'edit' => [
                'subtitle' => 'Продукт | Редактиране',
                'content_header_title' => 'Продукт',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на продукт',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на продукт',
            'content_header_subtitle' => 'създаване, актуализиране, изтриване и др.',
            'menu' => 'Продукт',
            'list' => 'Таблица на продуктите',
            'create' => 'Създаване на продукт',
            'edit' => 'Редактиране на продукт',
            'show' => 'Преглед на продукт',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ИД',
                'placeholder' => 'Изберете роля'
            ],
            'image' => [
                'title' => 'Изображение',
                'placeholder' => 'Изберете файл'
            ],
            'stripe_id' => [
                'title' => 'Stripe ID',
                'placeholder' => 'Stripe ID'
            ],
            'stripe_pricing_table_id' => [
                'title' => 'Stripe таблица за цени',
                'placeholder' => 'Stripe таблица за цени ID'
            ],
            'brand_id' => [
                'title' => 'Марка',
                'placeholder' => 'Изберете марка'
            ],
            'category_id' => [
                'title' => 'Категория',
                'placeholder' => 'Изберете категория'
            ],
            'sku' => [
                'title' => 'SKU',
                'placeholder' => 'Продукт SKU'
            ],
            'name' => [
                'title' => 'Име',
                'placeholder' => 'Име на продукт'
            ],
            'slug' => [
                'title' => 'Слаг',
                'placeholder' => 'product-slug'
            ],
            'description' => [
                'title' => 'Описание',
                'placeholder' => 'Описание на продукта'
            ],
            'availability' => [
                'title' => 'Наличност',
                'placeholder' => 'Изберете наличност'
            ],
            'condition' => [
                'title' => 'Състояние',
                'placeholder' => 'Изберете състояние'
            ],
            'price' => [
                'title' => 'Цена',
                'placeholder' => 'Цена на продукта'
            ],
            'upc' => [
                'title' => 'UPC',
                'placeholder' => 'UPC на продукта'
            ],
            'quantity' => [
                'title' => 'Количество',
                'placeholder' => 'Количество на продукта'
            ],
            'minimum' => [
                'title' => 'Минимално количество за поръчка',
                'placeholder' => ''
            ],
            'maximum' => [
                'title' => 'Максимално количество за поръчка',
                'placeholder' => ''
            ],
            'is_active' => [
                'title' => 'Статус',
                'placeholder' => 'Изберете статус'
            ],
            'is_hidden' => [
                'title' => 'Видимост',
                'placeholder' => 'Изберете видимост'
            ],
            'meta_title' => [
                'title' => 'Meta заглавие',
                'placeholder' => 'Meta заглавие на продукт'
            ],
            'meta_description' => [
                'title' => 'Meta описание',
                'placeholder' => 'Meta описание на продукт'
            ],
            'meta_keywords' => [
                'title' => 'Meta ключови думи',
                'placeholder' => 'Meta ключови думи на продукт'
            ],
            'meta_tags' => [
                'title' => 'Meta тагове',
                'placeholder' => 'Meta тагове на продукт'
            ],
            'created_at' => [
                'title' => 'Създаден на',
                'placeholder' => 'Изберете дата'
            ],
            'updated_at' => [
                'title' => 'Актуализиран на',
                'placeholder' => 'Изберете дата'
            ],
        ]
        ],

    'orders' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Поръчка | Списък',
                'content_header_title' => 'Поръчка',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица с поръчки'
            ],
            'create' => [
                'subtitle' => 'Поръчка | Създаване',
                'content_header_title' => 'Поръчка',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на поръчка'
            ],
            'show' => [
                'subtitle' => 'Поръчка | Преглед',
                'content_header_title' => 'Поръчка',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на поръчка'
            ],
            'edit' => [
                'subtitle' => 'Поръчка | Редактиране',
                'content_header_title' => 'Поръчка',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на поръчка',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на поръчки',
            'content_header_subtitle' => 'създаване, обновяване, изтриване и др.',
            'menu' => 'Поръчки',
            'list' => 'Таблица с поръчки',
            'create' => 'Създаване на поръчка',
            'edit' => 'Редактиране на поръчка',
            'show' => 'Преглед на поръчка',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ID',
                'placeholder' => 'ID на поръчка'
            ],
            'customer' => [
                'title' => 'Клиент',
                'placeholder' => 'Име на клиента'
            ],
            'phone' => [
                'title' => 'Телефон',
                'placeholder' => '+359 XXX XXX XXX'
            ],
            'amount' => [
                'title' => 'Сума',
                'placeholder' => '9.99'
            ],
            'status' => [
                'title' => 'Статус',
                'placeholder' => 'Изберете статус'
            ],
            'currency' => [
                'title' => 'Валута',
                'placeholder' => 'BGN'
            ],
            'created_at' => [
                'title' => 'Създадено на',
                'placeholder' => 'Изберете дата'
            ],
            'updated_at' => [
                'title' => 'Обновено на',
                'placeholder' => 'Изберете дата'
            ],
        ],
        'statuses' => [
            'pending' => 'Изчакване',
            'processing' => 'Обработка',
            'completed' => 'Завършена',
            'failed' => 'Неуспешна',
            'canceled' => 'Отменена',
        ]
    ],

    'blogs' => [
        'pages' => [
            'list' => [
                'subtitle' => 'Блог | Списък',
                'content_header_title' => 'Блог',
                'content_header_subtitle' => 'Списък',
                'content_card_title' => 'Таблица на блога'
            ],
            'create' => [
                'subtitle' => 'Блог | Създаване',
                'content_header_title' => 'Блог',
                'content_header_subtitle' => 'създаване',
                'content_card_title' => 'Създаване на блог'
            ],
            'show' => [
                'subtitle' => 'Блог | Преглед',
                'content_header_title' => 'Блог',
                'content_header_subtitle' => 'преглед',
                'content_card_title' => 'Преглед на блог'
            ],
            'edit' => [
                'subtitle' => 'Блог | Редактиране',
                'content_header_title' => 'Блог',
                'content_header_subtitle' => 'редактиране',
                'content_card_title' => 'Редактиране на блог',
            ]
        ],
        'titles' => [
            'content_header_title' => 'Управление на блоговете',
            'content_header_subtitle' => 'създаване, обновяване, изтриване и др.',
            'menu' => 'Блогове',
            'list' => 'Таблица с блогове',
            'create' => 'Създаване на блог',
            'edit' => 'Редактиране на блог',
            'show' => 'Преглед на блог',
            'tabs' => [
                'settings' => 'Настройки',
            ]
        ],
        'fields' => [
            'id' => [
                'title' => 'ID',
                'placeholder' => 'ID на блог'
            ],
            'title' => [
                'title' => 'Заглавие',
                'placeholder' => 'Заглавие'
            ],
            'description' => [
                'title' => 'Съдържание',
                'placeholder' => 'Съдържание'
            ],
            'image' => [
                'title' => 'Снимка'
            ],
            'created_at' => [
                'title' => 'Създадено на',
                'placeholder' => 'Изберете дата'
            ],
        ],
    ]
];
