<?php

use yii\db\Migration;

/**
 * Class m171116_081500_create_pages_and_categories
 */
class m171116_081500_create_pages_and_categories extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'slug' => $this->string(),
            'type' => $this->integer(),
            'seo_title' => $this->string(),
            'seo_keywords' => $this->string(),
            'seo_description' => $this->string()
        ], $tableOptions);

        $this->batchInsert('categories', ['name', 'description', 'slug', 'type', 'seo_title', 'seo_keywords', 'seo_description'], [
            [
                'Путешествие',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'putеschestvie',
                1,
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Религия',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'religia',
                1,
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Музыка',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'mysuka',
                2,
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Спорт',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'sport',
                2,
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ]
        ]);

        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->text(),
            'slug' => $this->string(),
            'category_id' => $this->integer(),
            'seo_title' => $this->string(),
            'seo_keywords' => $this->string(),
            'seo_description' => $this->string()
        ], $tableOptions);

        $this->batchInsert('pages', ['name', 'slug', 'category_id', 'text', 'seo_title', 'seo_keywords', 'seo_description'], [
            [
                'Аляска',
                'alaska',
                1,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Сибирь',
                'sibir',
                1,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Германия',
                'germania',
                1,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Украина',
                'ukraina',
                1,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Ислам',
                'islam',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Буддизм',
                'buddism',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Всё о Боге',
                'vse-o-boge',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Всё о сектах',
                'vse-o-sektah',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Егова наш друг?',
                'egova-nash-dryg',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Жизнь после смерти',
                'zizn-posle-smerti',
                2,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Вивальди',
                'vivaldi',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Бетховен',
                'bethoven',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Классическая музыка',
                'klassicheskaya-mysuka',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Танго с дьяволом',
                'tango-s-djavolom',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                '4 времени года',
                '4-vremeny-goda',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Классики современности',
                'klassiki-sovremenosti',
                3,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Крооссфит',
                'crossfit',
                4,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Американский футбол',
                'americanskiy-fytbol',
                4,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Диванный спорт',
                'divannuy-sport',
                4,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ],
            [
                'Спорт или физкультура?',
                'sport-ili-fizkultura?',
                4,
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus asperiores aspernatur aut autem beatae consectetur dolorum earum eum ex hic ipsam repellat, ut. Aut illum nesciunt sit vitae voluptates?',
                'seo-title',
                'seo-keyword, one, two, three',
                'seo-description many many description'
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('categories');
        $this->dropTable('pages');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171116_081500_create_pages_and_categories cannot be reverted.\n";

        return false;
    }
    */
}
