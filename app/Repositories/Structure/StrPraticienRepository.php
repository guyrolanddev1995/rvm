<?php
namespace App\Repositories\Structure;

use App\StrConsultation;
use App\Strpraticien;
use Illuminate\Support\Facades\Auth;

class StrPraticienRepository 
{
    /**
     * Recupere la liste des praticiens
     * @return mixed
     */
    public function all()
    {
        return Strpraticien::with('specialites')
                            ->orderBy('str_praticien_nom', 'asc')
                            ->get();
    }

    /**
     * Enregistre les donnes du praticien dans la
     * base de données
     * @param Array $data
     * @param $id
     * @return mixed
     */
    public function store(Array $data, $id)
    {
       
        $strPraticien = Strpraticien::create([
            'structure_id' => $id,
            'str_praticien_nom' => $data['nom'],
            'str_praticien_prenom' => $data['prenom'],
            'str_praticien_email' => $data['email'],
            'str_praticien_telephone' => $data['phone'],
            'str_praticien_date_naissance' => $data['date_naissance'],
            'str_praticien_lieu_naissance' => $data['lieu_naissance'],
            'str_praticien_sexe' => $data['sexe'],
            'str_praticien_lieu_residence' => $data['lieu_residence'],
            'ville' => $data['ville'],
            'commune' => $data['commune']
        ]);

        $strPraticien->specialites()->sync($data['specialites']);

        return $strPraticien;
    }

    /**
     * Recherche un praticien par son ID
     * @param Integer $id
     * @return mixed
     */
    public function findById($id)
    {
        return Strpraticien::findOrFail($id);
    }

    /**
     * Mettre à jour les données du praticien
     * @param Array $data
     * @param Integer $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $collection = collect($data);
        $record = $this->findById($id);

        $record->update([
            'str_praticien_nom' => $data['nom'],
            'str_praticien_prenom' => $data['prenom'],
            'str_praticien_email' => $data['email'],
            'str_praticien_telephone' => $data['phone'],
            'str_praticien_date_naissance' => $data['date_naissance'],
            'str_praticien_lieu_naissance' => $data['lieu_naissance'],
            'str_praticien_sexe' => $data['sexe'],
            'str_praticien_lieu_residence' => $data['lieu_residence'],
            'ville' => $data['ville'],
            'commune' => $data['commune']
        ]);
        

        if($collection->has('specialites')){
            $record->specialites()->sync($data['specialites']);
        } else {
            $record->specialites()->detach();
        }

        return $record;
    }

    /**
     * filtre une consultation
     * @param Array $data
     * @return mixed
     */
    public function findConsultationBy(Array $data)
    {
        return StrConsultation::where($data)->first();
    }

    /**
     * Enregistre une consultation dans la base de données 
     * @param Array $data
     * @param Integer $praticien
     * @return mixed
     */
    public function storeConsultation($data, $praticien)
    {
        return StrConsultation::create([
            'id_structure' => Auth::id(),
            'id_str_praticien' => $praticien,
            'id_specialite' => $data['specialite'],
            'jour' => $data['jour'],
            'heure_debut' => $data['heure_debut'],
            'heure_fin' => $data['heure_fin'] 
        ]);
    }

    /**
     * Mettre à jour les donnes de consultations
     * @param Array $params
     * @param Array $data
     * @return mixed
     */
    public function updateConsultation($data, $params)
    {
        $consultation = $this->findConsultationBy($params);
        return $consultation->update([
            'id_specialite' => $data['specialite'],
            'jour' => $data['jour'],
            'heure_debut' => $data['heure_debut'],
            'heure_fin' => $data['heure_fin'] 
        ]);
    }
}