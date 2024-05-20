@extends('layouts.app')

@section('content')
<div class="font-sans container mx-auto py-8">
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
            <div class="container mx-auto text-center">
                <h1 class="text-5xl font-bold mb-4">Bienvenue sur la Plateforme Sonatrach Access</h1>
                <p class="text-lg mb-8">Une gestion simplifiée pour les demandes d'accées</p>
                <a href="#about" class="inline-block px-8 py-3 rounded-lg bg-white text-blue-600 font-semibold shadow-md transition duration-300 ease-in-out hover:bg-blue-700 hover:text-white">En savoir plus</a>
            </div>
        </section>
        

    <!-- About Section -->
    <section id="about" class="py-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <h2 class="text-4xl font-bold mb-4">À propos de nous</h2>
                    <p class="text-lg mb-8">Sonatrach Access est une plateforme numérique conçue pour simplifier la gestion des demandes d'accées de Sonatrach et optimiser les opérations pour trois rôles clés : Chefs Complexes, Chefs IDC et Agents.</p>
                </div>
                <div class="mx-auto">
                    <img src="{{ asset('storage\téléchargement (9).jpg') }}" alt="About Image" class="rounded-lg shadow-lg" width="600px" height="400px">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12">Nos Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-4">Services pour les Chefs Complexes</h3>
                        <ul class="list-disc text-lg mb-4 ml-5">
                            <li>Demandes d'accès pour les chauffeurs et les camions</li>
                            <li>Suivi en temps réel des demandes</li>
                            <li>Gestion facile des listes de chauffeurs et de camions autorisés</li>
                        </ul>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-4">Services pour les Chefs IDC</h3>
                    <ul class="list-disc text-lg mb-4 ml-5">
                        <li>Gestion centralisée de toutes les demandes sur la plateforme</li>
                        <li>Validation et approbation rapides des demandes d'accès</li>
                        <li class="text-gray-500"><i>Tableaux de bord analytiques pour la surveillance des opérations (Bientôt) </i></li>
                    </ul>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-4">Services pour les Agents</h3>
                    <ul class="list-disc text-lg mb-4 ml-5">
                        <li>Gestion des autorisations et des impressions</li>
                        <li>Traitement efficace des demandes et des validations</li>
                        <li>Recherche rapide des demandes et autorisations</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 mb-8">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Contactez-nous</h2>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form>
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-semibold mb-2">Votre nom</label>
                        <input type="text" id="name" name="name" class="form-input w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" placeholder="Enter your name">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-lg font-semibold mb-2">Votre Email</label>
                        <input type="email" id="email" name="email" class="form-input w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" placeholder="Enter your email">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-lg font-semibold mb-2">Votre Message</label>
                        <textarea id="message" name="message" rows="5" class="form-textarea w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-8 py-3 rounded-md bg-blue-500 hover:bg-blue-600 text-white font-semibold transition duration-300">Envoyer Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
</div>
@endsection