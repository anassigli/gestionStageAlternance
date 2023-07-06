<?php

namespace App\Form;

use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendCandidacyType extends AbstractType
{
    private Offers $offer;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->offer = $options['offer'];
        $data = "<h1>Candidature sur l'offre" . $this->offer->getName() . "</h1>
<br>
<br>
<p>Bonjour M/Mme, </p>
<br>
<p>En vous souhaitant une bonne journée et en attente de votre réponse.</p>
<br>
<p>Cordialement</p>";

        $builder
            ->add('content', TextareaType::class, [
                'row_attr' => [
                    'class' => 'text-editor'
                ],
                'label' => 'Lettre de motivation',
                'data' => $data,
                'help' => "(Rédigez le mail en html). Une fois le mail validé, votre candidature sera en attente de validation par l'entreprise.",
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
