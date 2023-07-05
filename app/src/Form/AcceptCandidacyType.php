<?php

namespace App\Form;

use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcceptCandidacyType extends AbstractType
{
    private Offers $offer;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->offer = $options['offer'];
        $data = "<h1>Candidature sur l'offre" . $this->offer->getName() . "</h1>
<br>
<br>
<p>Votre candidature sur l'offre " . $this->offer->getName() . " a été acceptée !</p>
<p> " . $this->offer->getEnterprise()->getName() . " vous contactera sous peu.</p>";

        $builder
            ->add('content', TextareaType::class, [
                'row_attr' => [
                    'class' => 'text-editor'
                ],
                'label' => 'Corps du mail',
                'data' => $data,
                'help' => "(Rédigez le mail en html). Une fois le mail validé, les autres candidatures sur cette offres passeront automatiquement en statut refusé.",
                'help_attr' => [
                    'class' => 'text-gray-400 font-semibold'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'offer' => null
        ]);
    }
}
