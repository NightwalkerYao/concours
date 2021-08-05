<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class CandidateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
           'nom' => 'required|string|max:255',
           'prenom' => 'required|string|max:255',
           'date_naissance' => 'required|date|date_format:Y-m-d|before:'.date("Y-m-d", strtotime("-15 years")),
           'email' => 'required|string|email|max:255',
           'old_password' => "nullable|current_password",
           'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
           'motivation' => "nullable|string|max:5000",
           'photo_file' => "sometimes|file|image|max:10000",
           'sexe_id' => "required|integer|exists:sexes,id",
         ];
     }


     public function messages()
     {
       return [
         'old_password.current_password' => "L'ancien mot de passe est incorrect",
         'password.*' => "Le mot de passe doit etre d'au moins 8 caracteres.",
         'date_naissance.before' => "Le candidat doit avoir au moins 15 ans.",
         'email.unique' => "L'adresse email est déjà prise.",
         'photo_file.required' => "Veuillez ajouter la photo du candidat.",
         'photo_file.file' => "Le fichier photo n'est pas une image valide.",
         'photo_file.image' => "Le fichier photo n'est pas une image valide.",
         'photo_file.max' => "La photo est trop grande.",
         'sexe_id.exists' => "Veuillez sélectionner le sexe du case candidat.",
       ];
     }
}
