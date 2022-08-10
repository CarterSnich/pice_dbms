@extends('layouts.public_layout')

@section('title', 'About Us | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        .section {
            text-align: center;
            padding: 5.25rem;
        }

        .section>p {
            width: 50%;
            margin-inline: auto;
        }
    </style>
@endsection

@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/HISTORY-1536x240.png') }}" alt="">
    </div>
    {{-- pice mission --}}
    <div id="pice-mission" class="section">
        <h1 class="h1">MISSION</h1>
        <p>
            To advance the welfare of our members and the development and prestige of the civil engineering profession and to be a dynamic force in nation building.
        </p>
    </div>
    {{-- pice vision --}}
    <div id="pice-vision" class="section">
        <h1>VISION</h1>
        <p>
            The leader among professional
            organizations known globally for professionalism, integrity, excellence and social responsibility
            <br>
            <br>
            – A key player in nation building.
        </p>
    </div>
    {{-- pice core values --}}
    <div id="pice-core-values" class="section">
        <h1>PICE CORE VALUES</h1>
        <p>
            Professionalism
            <br>
            Integrity
            <br>
            Leadership
            <br>
            Excellence
            <br>
            Social Responsibility
        </p>
    </div>

    <style>
        #goal-and-objective>div>img {
            width: 80%;
            aspect-ratio: auto;
        }
    </style>
    {{-- goal and objective --}}
    <div id="goal-and-objective" class="section">
        <h1>GOAL AND OBJECTIVE</h1>
        <div>
            <img src="{{ asset('images/image-238.png') }}" alt="">
        </div>
    </div>

    <style>
        #pice-history>p {
            text-align: justify
        }
    </style>
    {{-- pice history --}}
    <div id="pice-history" class="section">
        <h1>PICE CORE VALUES</h1>
        <p>
            On December 11, 1973, the Securities and Exchange Commission issued Registration Certificate No.53896 to the PHILIPPINE INSTITUTE OF CIVIL ENGINEERS, INC. (PICE). This was the culmination and fulfillment of a vision to merge two separate organizations of civil engineers in the country, the Philippine Society of Civil Engineers (PSCE) and the Philippine Association of Civil Engineers (PACE).
        </p>
        <p>
            The Philippine Society of Civil Engineers (PSCE) was formed sometime in the late twenties by a group of civil engineers mostly from the government sector. It was the country’s first civil engineering organization with the late Engr. Marcial Kasilag as its first president. Engr. Kasilag holds the No.1 slot in the PRC Registry of Civil Engineers. He then occupied a high-ranking position in the government and the early members of PSCE were government engineers. There were relatively few civil engineers in private practice during that time as most of the early graduates were readily engaged by the various government agencies.
        </p>
        <p>
            In 1937, another group of civil engineers in the private sector, led by Enrique Sto. Tomas Cortes formed the Philippine Association of Civil Engineers (PACE). Mr. Cortes was its first president. The major objectives of both associations were similar: to elevate the standards of the profession, encourage research and engineering knowledge and technology, foster fellowship among members, and promote interrelation with other technological and scientific societies.
        </p>
        <p>
            The Philippine Association Civil Engineers (PACE) proved to be the more active between the two groups and this resulted to the transfer of many PSCE members to PACE. PACE, under the leadership of President Alberto Guevarra, was mainly responsible for the passage of Republic Act No. 544 otherwise known as the “Civil Engineering Law” in 1950. It was a milestone in establishing prestige and safeguarding the interest of the civil engineering profession in the country.
        </p>
        <p>
            It was sometime in 1972 under the administration of the late PACE President Cesar A. Caliwara when more serious effort was exerted to merge the two societies. Panel representatives were designated by both organizations to convene and start a series of talk. Leading members of PACE and PSCE, Eduardo Escobar, Pedro Afable, Angel Lazaro, Jr., Andres Hizon, Ambrosio Flores, Tomas de Guzman, Lucas Agbayani, to mention a few ere involved in the negotiation. The choice of a new name, formal accounting and turnover of assets and liabilities, accreditation of bonafide members and election rules for the first officers were some of the concerns that were sooner resolved.
        </p>
        <p>
            Finally, an election of the first officers and directors of the Philippine Institute of Civil Engineers, Inc. (PICE) was held sometime in February 1974 and Cesar A. Caliwara became the first President. During his term, the first International convention was held in the Philippines on May 20 to 24,1975 with the theme ” Civil Engineering in Disaster Prevention Control.” Proceedings in this convention were published into a book and sold to members and public. Also, the drive to organize provincial chapters was intensified in order to truly unite the civil engineers of the country. Another historical milestone was the accreditation (no. 007) of PICE by the Professional Regulation Commission on August 13, 1975 as the only official recognized organization of civil engineers in the Philippines.
        </p>
    </div>

    <div class="section">
        <iframe width="833" height="468" src="https://www.youtube.com/embed/EevedZkJdeU" title="PICE HYMN Short Version" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
@endsection
