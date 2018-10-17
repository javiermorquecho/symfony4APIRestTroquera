<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
//use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use App\Entity\TVentas;

class TVentasType extends AbstractType
{
	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $fecha = new \DateTime('now');
		$builder
			->add('idTCliente', NumberType::class, ['label'=> 'cliente'])
			->add('idTPrenda', NumberType::class, ['label' => 'prenda'])
			->add('fechaRegistro', TextType::class, ['label' => 'fecha','empty_data' => $fecha ] )
			->add('creditoInternoUsado', MoneyType::class, ['label' => 'credito'])
			->add('totalVenta', MoneyType::class, ['label' => 'total'])
		;
	}

	/**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TVentas::class,
            'csrf_protection' => false,
        ]);
	}
    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return '';
    }
}
