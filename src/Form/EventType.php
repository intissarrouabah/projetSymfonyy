<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\City;
use App\Entity\Event;
use App\Entity\Location;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Security\Core\Security;

class EventType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la sortie'
            ])
            ->add('startDate', DateTimeType::class, [
                'label' => 'Date et heure de la sortie'
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date limite d\'inscription'
            ])
            ->add('duration', IntegerType::class, [
                'label' => 'Durée en heures'
            ])
            ->add('maxRegistrations', IntegerType::class, [
                'label' => 'Nombre de places'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description et infos'
            ])
            ->add('organizer', EntityType::class, [
                'class' => Participant::class,
                'choice_label' => 'first_name',
            ])
            ->add('stateNumState', IntegerType::class, [
                'data' => 1,
            ])
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'choice_label' => 'name_campus',
            ])
            ->add('city', EntityType::class, [
            'class' => City::class,
            'choice_label' => 'name_city',
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'name_location'
            ]);


        /* todo: ajouter les reste des attributs: Lieu, Rue, Code postal, Latitude, Longitude  */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
