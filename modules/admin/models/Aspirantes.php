<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "aspirantes".
 *
 * @property string $folio
 * @property integer $id_plantel
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $nombres
 * @property string $curp
 * @property string $calle
 * @property string $no_exterior
 * @property string $no_interior
 * @property string $entre_calle_a
 * @property string $entre_calle_b
 * @property string $codigo_postal
 * @property string $telefono
 * @property string $telefono_alterno
 * @property string $celular
 * @property string $correoe
 * @property boolean $entrego_acta
 * @property boolean $entrego_certificado
 * @property boolean $entrego_comprobante
 * @property boolean $ya_inscrito
 * @property integer $id_usuario_alta
 * @property string $fecha_alta
 * @property integer $id_usuario_cambio
 * @property string $fecha_cambio
 * @property string $tutor_nombres
 * @property string $tutor_apellidos
 * @property integer $id_colonia
 * @property string $fecha_egreso_secundaria
 * @property integer $escuela
 * @property integer $id_modalidad
 * @property boolean $validado
 * @property integer $id_usuario_valida
 * @property boolean $p_acta
 * @property boolean $p_certificado
 * @property boolean $p_curp
 * @property integer $p_domicilio
 * @property boolean $participa_semi
 * @property boolean $entrego_curp
 * @property boolean $es_hombre
 * @property string $fecha_valida
 * @property integer $comprobante_secundaria
 * @property string $hora_alta
 * @property double $promedio_secundaria
 * @property integer $id_situacion
 * @property string $aiee
 * @property string $aiee_folio
 * @property integer $id_delegacion
 * @property string $colonia2
 */
class Aspirantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aspirantes';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folio', 'id_plantel', 'nombres', 'curp', 'calle', 'no_exterior', 'codigo_postal', 'id_usuario_alta', 'fecha_alta', 'p_acta', 'p_certificado', 'p_curp', 'p_domicilio', 'participa_semi', 'es_hombre'], 'required'],
            [['id_plantel', 'id_usuario_alta', 'id_usuario_cambio', 'id_colonia', 'escuela', 'id_modalidad', 'id_usuario_valida', 'p_domicilio', 'comprobante_secundaria', 'id_situacion', 'id_delegacion'], 'integer'],
            [['entrego_acta', 'entrego_certificado', 'entrego_comprobante', 'ya_inscrito', 'validado', 'p_acta', 'p_certificado', 'p_curp', 'participa_semi', 'entrego_curp', 'es_hombre'], 'boolean'],
            [['fecha_alta', 'fecha_cambio', 'fecha_egreso_secundaria', 'fecha_valida', 'hora_alta'], 'safe'],
            [['promedio_secundaria'], 'number'],
            [['aiee_folio', 'colonia2'], 'string'],
            [['folio'], 'string', 'max' => 7],
            [['primer_apellido', 'segundo_apellido', 'no_exterior', 'no_interior'], 'string', 'max' => 32],
            [['nombres', 'correoe', 'tutor_nombres', 'tutor_apellidos'], 'string', 'max' => 64],
            [['curp'], 'string', 'max' => 18],
            [['calle', 'entre_calle_a', 'entre_calle_b'], 'string', 'max' => 90],
            [['codigo_postal'], 'string', 'max' => 5],
            [['telefono', 'telefono_alterno'], 'string', 'max' => 15],
            [['celular'], 'string', 'max' => 13],
            [['aiee'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'folio' => 'Folio',
            'id_plantel' => 'Id Plantel',
            'primer_apellido' => 'Primer Apellido',
            'segundo_apellido' => 'Segundo Apellido',
            'nombres' => 'Nombres',
            'curp' => 'Curp',
            'calle' => 'Calle',
            'no_exterior' => 'No Exterior',
            'no_interior' => 'No Interior',
            'entre_calle_a' => 'Entre Calle A',
            'entre_calle_b' => 'Entre Calle B',
            'codigo_postal' => 'Codigo Postal',
            'telefono' => 'Telefono',
            'telefono_alterno' => 'Telefono Alterno',
            'celular' => 'Celular',
            'correoe' => 'Correoe',
            'entrego_acta' => 'Entrego Acta',
            'entrego_certificado' => 'Entrego Certificado',
            'entrego_comprobante' => 'Entrego Comprobante',
            'ya_inscrito' => 'Ya Inscrito',
            'id_usuario_alta' => 'Id Usuario Alta',
            'fecha_alta' => 'Fecha Alta',
            'id_usuario_cambio' => 'Id Usuario Cambio',
            'fecha_cambio' => 'Fecha Cambio',
            'tutor_nombres' => 'Tutor Nombres',
            'tutor_apellidos' => 'Tutor Apellidos',
            'id_colonia' => 'Id Colonia',
            'fecha_egreso_secundaria' => 'Fecha Egreso Secundaria',
            'escuela' => 'Escuela',
            'id_modalidad' => 'Id Modalidad',
            'validado' => 'Validado',
            'id_usuario_valida' => 'Id Usuario Valida',
            'p_acta' => 'P Acta',
            'p_certificado' => 'P Certificado',
            'p_curp' => 'P Curp',
            'p_domicilio' => 'P Domicilio',
            'participa_semi' => 'Participa Semi',
            'entrego_curp' => 'Entrego Curp',
            'es_hombre' => 'Es Hombre',
            'fecha_valida' => 'Fecha Valida',
            'comprobante_secundaria' => 'Comprobante Secundaria',
            'hora_alta' => 'Hora Alta',
            'promedio_secundaria' => 'Promedio Secundaria',
            'id_situacion' => 'Id Situacion',
            'aiee' => 'Aiee',
            'aiee_folio' => 'Aiee Folio',
            'id_delegacion' => 'Id Delegacion',
            'colonia2' => 'Colonia2',
        ];
    }
}
