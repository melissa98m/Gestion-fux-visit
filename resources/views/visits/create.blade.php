@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter une visite </h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('visits.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Début de la visite</label>
                                    <input type="datetime-local" name="visit_start" class="form-control">
                                    <label>Fin de la visite</label>
                                    <input type="datetime-local" name="visit_end" class="form-control">
                                    <label>Object de la visite</label>
                                    <input type="text" name="visit_purpose" class="form-control">
                                    <label>Commentaire</label>
                                    <input type="text" name="visit_comment" class="form-control">
                                    <label>Visiteur</label>
                                    <div class="select">
                                        <select name="visitor_id">
                                            @foreach($visitors as $vistor)
                                                <option value="{{ $vistor->id }}">{{ $vistor->visitor_lastname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label>Statut</label>
                                    <div class="select">
                                        <select name="status_id">
                                            @foreach($status as $statut)
                                                <option value="{{ $statut->id }}">{{ $statut->status_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill m-2">Créer une visite</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
