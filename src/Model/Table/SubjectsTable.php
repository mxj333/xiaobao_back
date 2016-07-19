<?php
namespace App\Model\Table;

use App\Model\Entity\Subject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Catalogs
 */
class SubjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('subjects');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Catalogs', [
            'foreignKey' => 'catalog_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('body');

        $validator
            // ->add('type', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('type');

        $validator
            ->allowEmpty('answer');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['catalog_id'], 'Catalogs'));
        return $rules;
    }

    //生成考题
    public function generate() {
        //单选题数量
        $single_selection = 3;

        //多选题数量
        $multiselect = 5;

        //判断题数量
        $judgement = 2;
        
        $subjects = $this->questionTypes(1, 3);        
        $subjects2 = $this->questionTypes(2, 5);        
        $subjects3 = $this->questionTypes(3, 2);        
        $subjects = array_merge($subjects, $subjects2, $subjects3);

        $query = $this->find()
            ->select(['type', 'title', 'body', 'answer'])
            ->where(['id IN' => $subjects]);
        // $this->paginate($query);
        return $query;
    }

    //题型数量
    public function questionTypes($type, $nume) {
     
        $subjects = $this->find();        
        $subjects->select([
                'min' => $subjects->func()->min('Subjects.id'),
                'max' => $subjects->func()->max('Subjects.id')
            ])
            ->where(['type' => $type])
            ->toArray();
        foreach ($subjects as $maxAin) {
            $ma['max'] = $maxAin->max;
            $ma['min'] = $maxAin->min;
        }                    
        $rand = rand($ma['min'], $ma['max']);
        $tmp = array();
        while(count($tmp) < $nume){
            $tmp[] = mt_rand($ma['min'], $ma['max']);
            $tmp = array_unique($tmp);
        }
        return $tmp;
    }
}
