<?php

namespace App\Form;

use App\Entity\Enterprise;
use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendSpontaneousCandidacyType extends AbstractType
{
    private Enterprise $enterprise;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->enterprise = $options['enterprise'];
        $data = "<p>Bonjour M/Mme, </p>
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
                'help' => "(Rédigez le mail en html). Une fois le mail validé, l'entreprise recevra votre candidature rédigée ainsi que votre CV.",
                'help_attr' => [
                    'class' => 'text-gray-400 font-semibold'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'enterprise' => null
        ]);
    }
}
