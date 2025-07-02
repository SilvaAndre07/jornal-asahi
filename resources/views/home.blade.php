<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornal Asahi - Portal de Notícias de Assaí</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo">
                        <img src="{{ asset('assets/logo-asahi.png') }}" alt="Jornal Asahi Logo" class="logo-image">
                    </div>
                </div>
                <nav class="nav-menu">
                    <a href="#inicio" class="nav-link active">Início</a>
                    <a href="{{ url('/news') }}" class="nav-link">Notícias</a>
                    <a href="https://valedosol.assai.pr.gov.br/" target="_blank" class="nav-link">Vale do Sol</a>
                    <a href="{{ url('/equipe') }}" class="nav-link">Equipe</a>
                    @guest
                    <a href="{{ url('/login') }}" class="nav-link">Entrar</a>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endguest
            </div>
        </div>
        </nav>
        <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section (mantida intacta) -->
        <section class="hero-section" id="inicio">
            <div class="featured-news">
                <div class="carousel-container">
                    <div class="carousel" id="newsCarousel">
                        <div class="carousel-track">
                            <div class="carousel-slide active">
                                <div class="slide-image">
                                    @foreach ($featuredNews as $item)
                                    <div class="slide-image">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="slide-overlay">
                                    <div class="slide-content">
                                        <h3>Principais Notícias</h3>
                                        <p>Acompanhe os acontecimentos mais relevantes da cidade, com informações
                                            atualizadas e cobertura dos principais fatos que impactam a comunidade.</p>
                                        <a href="#noticias" class="btn btn-primary">Ver mais</a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-slide">
                                <div class="slide-image">
                                    <img src="{{ asset('assets/forum-jovem-bg.jpg') }}" alt="Fórum Jovem">
                                </div>
                                <div class="slide-overlay">
                                    <div class="slide-content">
                                        <h3>Fórum-Jovem</h3>
                                        <p>Um espaço online para você descobrir tudo o que Assaí tem a oferecer para os
                                            jovens.
                                            Conheça oportunidades, participe de atividades e fique por dentro dos
                                            projetos que estão fazendo a diferença na sua cidade.</p>
                                        <a href="" class="btn btn-primary">Ver mais</a>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-slide">
                                <div class="slide-image">
                                    <img src="{{ asset('assets/galeria-bg.jpg') }}" alt="Galeria">
                                </div>
                                <div class="slide-overlay">
                                    <div class="slide-content">
                                        <h3>Galeria</h3>
                                        <p>Confira as imagens dos principais eventos, obras e momentos marcantes de
                                            Assaí. Uma seleção especial para você reviver cada acontecimento.</p>
                                        <a href="#galeria" class="btn btn-primary">Ver galeria</a>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                                                        <div class="carousel-slide">
                                                            <div class="slide-image">
                                                                <img src="{{ asset('assets/enquete-bg.jpg') }}" alt="Enquetes">
                                                            </div>
                                                            <div class="slide-overlay">
                                                                <div class="slide-content">
                                                                    <h3>Enquetes</h3>
                                                                    <p>Participe das enquetes e dê sua opinião sobre temas importantes para o
                                                                        desenvolvimento da cidade. Sua voz faz a diferença!</p>
                                                                    <a href="#enquete" class="btn btn-primary">Responder</a>
                                                                </div>
                                                            </div>
                                                        </div>
                            -->

                            <div class="carousel-slide">
                                <div class="slide-image">
                                    <img src="{{ asset('assets/entrevistas-bg.png') }}" alt="Entrevistas">
                                </div>
                                <div class="slide-overlay">
                                    <div class="slide-content">
                                        <h3>Entrevistas</h3>
                                        <p>Veja entrevistas exclusivas com autoridades, especialistas e moradores que
                                            trazem diferentes perspectivas sobre os temas que movimentam Assaí.</p>
                                        <a href="#entrevistas" class="btn btn-primary">Assistir agora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-btn carousel-prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-btn carousel-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="carousel-indicators">
                            <button class="indicator active" data-slide="0"></button>
                            <button class="indicator" data-slide="1"></button>
                            <button class="indicator" data-slide="2"></button>
                            <button class="indicator" data-slide="3"></button>
                            <button class="indicator" data-slide="4"></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <!-- News Section -->
            <section class="news-section" id="noticias">
                <div class="section-header">
                    <div class="section-title">
                        <h2><i class="fas fa-newspaper"></i> Notícias em Destaque</h2>
                        <p>Mantenha-se informado com as últimas notícias da cidade</p>
                    </div>
                    <div class="news-controls">
                        <button class="news-nav-btn news-prev" id="newsPrev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="news-nav-btn news-next" id="newsNext">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <a href="{{ url('/news') }}" class="view-all-btn">
                            Ver todas <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="news-slider-container">
                    <div class="news-slider" id="newsSlider">
                        <div class="news-track" id="newsTrack">
                            @foreach ($featuredNews as $index => $item)
                            <div class="news-slide {{ $index === 0 ? 'active' : '' }}">
                                <article class="news-card featured">
                                    @if ($item->image)
                                    <div class="news-image">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                    </div>
                                    @else
                                    <div class="noimage">
                                        <span>Sem imagem</span>
                                    </div>
                                    @endif
                                    <div class="news-content">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ Str::limit(html_entity_decode(strip_tags($item->content)), 100) }} </p>
                                        <div class="news-meta">
                                            <span class="news-date"><i class="fas fa-calendar"></i> {{ $item->published_at->format('d/m/Y H:i') }}</span>
                                            <span class="news-author"><i class="fas fa-user"></i>{{ $item->author->name }}</span>
                                        </div>
                                        <a href="#" class="read-more">Ler mais <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>

                        <!-- Progress Bar -->
                        <div class="news-progress">
                            <div class="news-progress-bar" id="newsProgressBar"></div>
                        </div>

                        <!-- Indicators -->
                        <div class="news-indicators" id="newsIndicators">
                            @foreach($featuredNews as $index => $item)
                            <button class="news-indicator{{ $index == 0 ? ' active' : '' }}" data-slide="{{ $index }}"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- Forum Section -->
            <section class="forum-section" id="forum">
                <div class="forum-container">
                    <div class="forum-content">
                        <div class="forum-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="forum-text">
                            <h2>Fórum Jovem</h2>
                            <div class="forum-description">
                                <p>Participe do nosso fórum online e compartilhe suas ideias, dúvidas e sugestões com a comunidade jovem de Assaí. Um espaço para diálogo, aprendizado e construção coletiva.</p>

                                <div class="forum-features">
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Acesso a Cursos Gratuitos</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Oportunidades de Emprego</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Networking</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Auxílios</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Workshops e Eventos</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-dot"></div>
                                        <span>Carteirinha Exclusiva</span>
                                    </div>
                                </div>
                            </div>
                            <div class="forum-action">
                                <a href="https://valedosol.assai.pr.gov.br/forum-jovem/" class="forum-btn" target="_blank">
                                    <i class="fas fa-users"></i>
                                    Acessar Fórum
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="gallery-section" id="galeria">
                <div class="section-header">
                    <div class="section-title">
                        <h2><i class="fas fa-camera"></i> Galeria de Fotos</h2>
                        <p>Visualize todas as imagens dos principais eventos da cidade</p>
                    </div>
                    <a href="{{ route('gallery.index') }}" class="view-all-btn">
                        Ver todas <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="gallery-grid">
                    @if(isset($galleryImages) && $galleryImages->count() > 0)
                    @foreach($galleryImages->take(9) as $image)
                    <div class="gallery-item large" data-title="{{ $image->news->title ?? 'Sem título' }}">
                        <img src="{{ asset('storage/' . $image->path) }}"
                            alt="{{ $image->news->title ?? 'Imagem da notícia' }}"
                            data-img-src="{{ asset('storage/' . $image->path) }}"
                            data-news-title="{{ $image->news->title ?? 'Sem título' }}"
                            data-news-url="{{ route('news.show', $image->news_id) }}">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>{{ Str::limit($image->news->title ?? 'Sem título', 30) }}</h4>
                                <a href="{{ route('news.show', $image->news_id) }}" class="stretched-link" aria-hidden="true"></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12">
                        <div class="alert alert-light text-center" style="background:#f8fafc;color:#374151;padding:2rem;border-radius:12px;">
                            Ainda não há imagens na galeria.
                        </div>
                    </div>
                    @endif
                </div>
            </section>



            <!-- Polls Section 
            <section class="polls-section" id="enquete">
                <div class="section-header centered">
                    <div class="section-title">
                        <h2><i class="fas fa-poll"></i> Enquetes Ativas</h2>
                        <p>Participe e deixe sua opinião sobre temas importantes da cidade</p>
                    </div>
                </div>

                <div class="polls-container">
                    <div class="poll-card active-poll">
                        <div class="poll-header">
                            <h3>Você apoia a construção de uma nova escola na cidade?</h3>
                            <div class="poll-status">
                                <span class="poll-votes">1,247 votos</span>
                                <span class="poll-time">Termina em 5 dias</span>
                            </div>
                        </div>
                        <form class="poll-form" data-poll="1">
                            <div class="poll-options">
                                <label class="poll-option">
                                    <input type="radio" name="poll1" value="sim">
                                    <span class="option-text">Sim, é necessário</span>
                                    <span class="option-percentage">68%</span>
                                </label>
                                <label class="poll-option">
                                    <input type="radio" name="poll1" value="nao">
                                    <span class="option-text">Não, outras prioridades</span>
                                    <span class="option-percentage">32%</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary poll-submit">
                                <i class="fas fa-vote-yea"></i> Votar
                            </button>
                        </form>
                    </div>

                    <div class="poll-card">
                        <div class="poll-header">
                            <h3>Qual é a sua opinião sobre o novo projeto de transporte público?</h3>
                            <div class="poll-status">
                                <span class="poll-votes">892 votos</span>
                                <span class="poll-time">Termina em 3 dias</span>
                            </div>
                        </div>
                        <form class="poll-form" data-poll="2">
                            <div class="poll-options">
                                <label class="poll-option">
                                    <input type="radio" name="poll2" value="excelente">
                                    <span class="option-text">Excelente iniciativa</span>
                                    <span class="option-percentage">45%</span>
                                </label>
                                <label class="poll-option">
                                    <input type="radio" name="poll2" value="bom">
                                    <span class="option-text">Bom, mas pode melhorar</span>
                                    <span class="option-percentage">38%</span>
                                </label>
                                <label class="poll-option">
                                    <input type="radio" name="poll2" value="ruim">
                                    <span class="option-text">Não atende necessidades</span>
                                    <span class="option-percentage">17%</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary poll-submit">
                                <i class="fas fa-vote-yea"></i> Votar
                            </button>
                        </form>
                    </div>

                    <div class="poll-card">
                        <div class="poll-header">
                            <h3>Você gostaria de ver mais eventos culturais na cidade?</h3>
                            <div class="poll-status">
                                <span class="poll-votes">1,456 votos</span>
                                <span class="poll-time">Termina em 1 dia</span>
                            </div>
                        </div>
                        <form class="poll-form" data-poll="3">
                            <div class="poll-options">
                                <label class="poll-option">
                                    <input type="radio" name="poll3" value="sim">
                                    <span class="option-text">Sim, definitivamente</span>
                                    <span class="option-percentage">82%</span>
                                </label>
                                <label class="poll-option">
                                    <input type="radio" name="poll3" value="nao">
                                    <span class="option-text">Não, está bom assim</span>
                                    <span class="option-percentage">18%</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary poll-submit">
                                <i class="fas fa-vote-yea"></i> Votar
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            -->

            <!-- Stream Section -->
            <section class="stream-section" style="margin:0 auto;">
                <div class="section-title">
                    <h2><i class="fas fa-video"></i>Tv Vale do Sol</h2>
                    <p style="margin-bottom: 30px;">Lives e vídeos novos direto pra você!</p>

                    <div class="section-header" style="width:100%;display:flex;gap:2rem;align-items:stretch;width:1180px;">
                        <!---Div da Esquerda-->
                        <div class="stream-title" style="flex:1;display:flex;flex-direction:column;justify-content:stretch;height:100%;min-width:0;">
                            <h2><i class="fab fa-youtube"></i>Acesse nosso canal</h2>
                            <p>🎬 Vídeo em Destaque</p>
                            <iframe width="640" height="360"
                                src="https://www.youtube.com/embed/tsE2glEVIyE?si=YzMifivyq7NnOrn-"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                style="width:100%;height:360px;min-height:240px;max-height:400px;object-fit:cover;border-radius:8px;"></iframe>

                            <a href="https://www.youtube.com/@valedosolpr" target="_blank" rel="noopener noreferrer" style="margin-top:auto;">
                                <button class="botaoyoutubestream"> <i class="fas fa-bell"></i>Ver mais no canal</button>
                            </a>
                        </div>
                        <!---Div da Direita-->
                        <div class="live-title" style="flex:1;display:flex;flex-direction:column;justify-content:stretch;height:555px;min-width:0;">
                            @if(isset($activeLiveStream) && $activeLiveStream)
                            <h2><i class="fa-solid fa-broadcast-tower"></i> Ao Vivo</h2>
                            <p>Assista agora a nossa transmissão ao vivo!</p>
                            <iframe width="640" height="360"
                                src="https://www.youtube.com/embed/{{ $activeLiveStream->youtube_video_id }}?autoplay=0&rel=0"
                                title="{{ $activeLiveStream->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                style="width:100%;height:360px;min-height:240px;max-height:400px;object-fit:cover;border-radius:8px;"></iframe>
                            <div class="mt-2 mb-2">
                                <span class="badge bg-danger" style="background:#ef4444;color:white;padding:0.4em 1em;border-radius:12px;font-size:0.95em;">
                                    <i class="fas fa-circle" style="font-size:0.7em;margin-right:0.4em;"></i> AO VIVO
                                </span>
                                <span class="ml-2" style="color:#6b7280;font-size:0.95em;">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($activeLiveStream->start_time)->format('d/m/Y') }}
                                </span>
                            </div>
                            <a href="https://www.youtube.com/watch?v={{ $activeLiveStream->youtube_video_id }}" target="_blank" rel="noopener noreferrer" style="margin-top:auto;">
                                <button class="botaoyoutubestream"><i class="fab fa-youtube"></i> Assistir no YouTube</button>
                            </a>
                            <h3 class="card-title h6 mt-2 mb-0" style="font-weight:600;">{{ Str::limit($activeLiveStream->title, 40) }}</h3>
                            @else
                            <h2><i class="fa-solid fa-broadcast-tower"></i> Transmissões</h2>
                            <p>Nenhuma transmissão ao vivo no momento</p>
                            <div class="divAoVivo2 text-center" style="background:#f8fafc;">
                                <i class="fas fa-video-slash text-muted mb-3" style="font-size:2rem;"></i>
                                <h3 class="h6 mb-2" style="font-weight:600;">Nenhuma transmissão ao vivo</h3>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>



            <!-- Interviews Section -->
            <section class="interviews-section" id="entrevistas">
                <div class="section-header">
                    <div class="section-title">
                        <h2><i class="fas fa-microphone"></i> Entrevistas Exclusivas</h2>
                        <p>Conversas com personalidades e autoridades da cidade</p>
                    </div>
                    <a href="{{ route('interviews.list') }}" class="view-all-btn">
                        Ver todas <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                @if(isset($featuredInterview) && $featuredInterview)
                <div class="interviews-grid">
                    <div class="interview-card featured">
                        <div class="video-thumbnail" style="cursor:pointer;" onclick="window.open('https://www.youtube.com/watch?v={{ $featuredInterview->youtube_video_id }}','_blank')">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $featuredInterview->youtube_video_id }}?rel=0"
                                title="{{ $featuredInterview->title }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                style="width:100%;height:100%;border-radius:8px;object-fit:cover;"></iframe>
                        </div>
                        <div class="interview-content">
                            <div class="interview-category">{{ $featuredInterview->category ?? 'Entrevista' }}</div>
                            <h3>{{ $featuredInterview->title }}</h3>
                            @if($featuredInterview->interviewee)
                            <p class="interviewee">
                                <i class="fas fa-user"></i>
                                {{ $featuredInterview->interviewee }}
                            </p>
                            @endif
                            <p class="description">{{ Str::limit($featuredInterview->description, 150) }}</p>
                            <div class="interview-stats">
                                <span class="views"><i class="fas fa-eye"></i> {{ $featuredInterview->views ?? '—' }} visualizações</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ $featuredInterview->interview_date ? $featuredInterview->interview_date->format('d/m/Y') : 'Data não definida' }}</span>
                            </div>
                        </div>
                    </div>
                    @if(isset($latestInterviews) && count($latestInterviews))
                    @foreach($latestInterviews->take(2) as $interview)
                    <div class="interview-card">
                        <div class="video-thumbnail" style="cursor:pointer;" onclick="window.open('https://www.youtube.com/watch?v={{ $interview->youtube_video_id }}','_blank')">
                            <img src="https://img.youtube.com/vi/{{ $interview->youtube_video_id }}/mqdefault.jpg" alt="{{ $interview->title }}">
                            <div class="play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">{{ $interview->duration ?? '' }}</div>
                        </div>
                        <div class="interview-content">
                            <div class="interview-category {{ $interview->category ? strtolower($interview->category) : '' }}">{{ $interview->category ?? 'Entrevista' }}</div>
                            <h3>{{ Str::limit($interview->title, 60) }}</h3>
                            @if($interview->interviewee)
                            <p class="interviewee">
                                <i class="fas fa-user"></i>
                                {{ $interview->interviewee }}
                            </p>
                            @endif
                            <p class="description">{{ Str::limit($interview->description, 80) }}</p>
                            <div class="interview-stats">
                                <span class="views"><i class="fas fa-eye"></i> {{ $interview->views ?? '—' }} visualizações</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ $interview->interview_date ? $interview->interview_date->format('d/m/Y') : 'Data não definida' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                @else
                <div class="interviews-grid">
                    <div class="col-12">
                        <div class="alert alert-info" style="background:#f8fafc;color:#374151;padding:2rem;border-radius:12px;">
                            Nenhuma entrevista disponível no momento.
                        </div>
                    </div>
                </div>
                @endif

                <div class="text-center mt-3 d-md-none">
                    <a href="{{ route('interviews.list') }}" class="btn btn-primary">
                        Ver todas as entrevistas
                    </a>
                </div>
            </section>

            <!-- Team Section -->
            <section class="team-section">
                <div class="team-container">
                    <div class="team-content">
                        <div class="team-text">
                            <h2><i class="fas fa-users"></i> Nossa Equipe de Repórteres</h2>
                            <p>Estudantes do ensino fundamental e médio levando informação de qualidade para toda a
                                comunidade de Assaí.</p>
                            <!--<div class="team-highlights">
                                <div class="highlight">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Quantidade de Repórteres</span>
                                </div>
                                <div class="highlight">
                                    <i class="fas fa-newspaper"></i>
                                    <span>Matérias publicadas</span>
                                </div>
                                <div class="highlight">
                                    <i class="fas fa-award"></i>
                                    <span>Prêmios</span>
                                </div>
                            </div>-->
                            <button class="btn btn-primary" onclick="window.location.href='{{ url('/equipe') }}'">
                                <i class="fas fa-info-circle"></i>
                                Conheça a Equipe
                            </button>
                        </div>
                        <div class="team-image">
                            <img src="{{ asset('assets/equipe.jpg') }}" alt="Equipe de Repórteres Mirins de Assaí">
                            <div class="team-badge">
                                <i class="fas fa-star"></i>
                                <span>Equipe 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Image Modal -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Imagem da galeria</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="/placeholder.svg" alt="">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">
                    Ver mais fotos <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-content">
            <div class="close-menu" id="closeMenu"><i class="fas fa-times"></i></div>
            <a href="#inicio" class="mobile-nav-link">Início</a>
            <a href="#noticias" class="mobile-nav-link">Notícias</a>
            <a href="#galeria" class="mobile-nav-link">Galeria</a>
            <a href="#entrevistas" class="mobile-nav-link">Entrevistas</a>
            <a href="#contato" class="mobile-nav-link">Contato</a>
            <a href="https://valedosol.assai.pr.gov.br/" target="_blank" class="mobile-nav-link">Contato</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-gray-900 text-white w-full pt-12 pb-4">
        <div class="container mx-auto px-4">
            <div class="footer-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-8">
                <div class="footer-section">
                    <div class="footer-logo flex items-center gap-3 mb-4">
                        <div class="logo-text">
                            <h3 class="text-xl font-bold">Jornal Asahi</h3>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Jornal municipal administrado por estudantes do ensino médio e fundamental da cidade de Assaí,
                        focado em notícias, cultura e eventos para os jovens da comunidade.
                    </p>
                </div>
                <div class="footer-section">
                    <h4 class="font-semibold mb-4 text-white">Links Rápidos</h4>
                    <ul class="list-none">
                        <li class="mb-2">
                            <a href="#inicio" class="text-gray-400 hover:text-orange-500 transition-colors duration-300 no-underline">Início</a>
                        </li>
                        <li class="mb-2">
                            <a href="#noticias" class="text-gray-400 hover:text-orange-500 transition-colors duration-300 no-underline">Notícias</a>
                        </li>
                        <li class="mb-2">
                            <a href="#galeria" class="text-gray-400 hover:text-orange-500 transition-colors duration-300 no-underline">Galeria</a>
                        </li>
                        <li class="mb-2">
                            <a href="#entrevistas" class="text-gray-400 hover:text-orange-500 transition-colors duration-300 no-underline">Entrevistas</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="font-semibold mb-4 text-white">Contato</h4>
                    <div class="contact-info">
                        <p class="text-gray-400 mb-2 flex items-center gap-2"><i class="fas fa-envelope"></i>secti@assai.pr.gov.br</p>
                        <p class="text-gray-400 mb-2 flex items-center gap-2"><i class="fas fa-phone"></i> (43)3262-8306</p>
                        <p class="text-gray-400 mb-2 flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Assaí - PR</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom border-t border-gray-800 pt-4 flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
                <p class="mb-2 md:mb-0">&copy; 2025 Jornal Asahi. Todos os direitos reservados.</p>
                <span>Desenvolvido pela Secretaria de Ciência, Tecnologia e Inovação.</span>
            </div>
        </div>
    </footer>

    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles (mantido) */
        .header {
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header::after {
            content: "";
            display: block;
            height: 4px;
            background: linear-gradient(to right, #f97316, #f5cc29);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
        }

        .logo-section {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
        }

        .logo-image {
            width: 276px;
            height: 72px;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            margin-left: auto;
        }

        .nav-link {
            text-decoration: none;
            color: #4b5563;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #f97316;
        }

        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 2px;
            background: #f97316;
            border-radius: 1px;
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 1.5rem;
            color: #4b5563;
            cursor: pointer;
        }

        .mobile-menu-content {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100vw;
            box-sizing: border-box;
        }

        /* Main Content */
        .main-content {
            padding: 0;
        }

        /* Hero Section (mantida intacta) */
        .hero-section {
            margin-bottom: 3rem;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .carousel {
            position: relative;
            height: 650px;
        }

        .carousel-track {
            position: relative;
            height: 100%;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
            transition: opacity 0.8s ease-in-out;
            pointer-events: none;
        }

        .carousel-slide.active {
            opacity: 1;
            z-index: 1;
            pointer-events: auto;
        }

        .slide-image {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            position: relative;
            z-index: 2;
        }

        .slide-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            background: linear-gradient(to left, rgba(0, 0, 0, 0.7) 20%, rgba(0, 0, 0, 0.3) 100%, rgba(0, 0, 0, 0) 100%);
            padding: 0 2rem;
            z-index: 3;
        }

        .slide-content {
            max-width: 30%;
            color: #fff;
            margin-right: 10%;
        }

        .slide-content h3 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .slide-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(214, 0, 0, 0.2);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            z-index: 4;
        }

        .carousel-prev {
            left: 2rem;
        }

        .carousel-next {
            right: 2rem;
        }

        .carousel-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-indicators {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 4;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            background: white;
            width: 30px;
            border-radius: 6px;
        }

        /* Section Styles */
        .section-header {
            display: flex;
            align-items: flex-start;
            gap: 30px;
        }

        .section-header.centered {
            justify-content: center;
            text-align: center;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title h2 i {
            color: #f97316;
            font-size: 1.5rem;
        }

        .section-title p {
            color: #6b7280;
            font-size: 1rem;
        }

        .view-all-btn {
            text-decoration: none;
            color: #f97316;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: 2px solid #f97316;
            border-radius: 25px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .view-all-btn:hover {
            background: #f97316;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        /* Button Styles */
        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f97316, #f5cc29);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
            filter: brightness(1.05);
        }

        /* News Section - Slider */
        .news-section {
            margin-bottom: 4rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
        }

        .news-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .news-nav-btn {
            width: 45px;
            height: 45px;
            border: 2px solid #f97316;
            background: white;
            color: #f97316;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .news-nav-btn:hover {
            background: #f97316;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        .news-nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .news-slider-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .news-slider {
            position: relative;
            width: 100%;
            height: 500px;
        }

        .news-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            height: 100%;
        }

        .news-slide {
            min-width: 100%;
            height: 100%;
            position: relative;
        }

        .news-card {
            height: 100%;
            display: flex;
            background: white;
            border-radius: 0;
            overflow: hidden;
            box-shadow: none;
            transition: none;
        }

        .news-card:hover {
            transform: none;
            box-shadow: none;
        }

        .news-card.featured {
            flex-direction: row;
        }

        .news-card.featured .news-image {
            width: 60%;
            height: 100%;
            position: relative;
        }

        .news-card.featured .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .news-slide:hover .news-image img {
            transform: scale(1.05);
        }

        .news-category {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            background: #f97316;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            z-index: 2;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .news-category.culture {
            background: #8b5cf6;
        }

        .news-category.health {
            background: #10b981;
        }

        .news-category.sports {
            background: #ef4444;
        }

        .news-category.economy {
            background: #f59e0b;
        }

        .news-category.tech {
            background: #3b82f6;
        }

        .news-content {
            width: 40%;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }

        .news-content h3 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
            line-height: 1.3;
        }

        .news-content p {
            color: #6b7280;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 1rem;
        }

        .news-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: #9ca3af;
        }

        .news-date,
        .news-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .read-more {
            color: #f97316;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            font-size: 1rem;
            margin-top: auto;
        }

        .read-more:hover {
            color: #ea580c;
            transform: translateX(5px);
        }

        /* Progress Bar */
        .news-progress {
            height: 4px;
            background: #e5e7eb;
            position: relative;
            overflow: hidden;
        }

        .news-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #f97316, #f5cc29);
            width: 0%;
            transition: width 0.3s ease;
            position: relative;
        }

        .news-progress-bar::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 20px;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3));
            animation: shimmer 2s infinite;
        }

        .noimage {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f97316, #f5cc29);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            border-radius: 20px;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-20px);
            }

            100% {
                transform: translateX(20px);
            }
        }

        /* Indicators */
        .news-indicators {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.5rem;
            background: white;
        }

        .news-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background: #d1d5db;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .news-indicator:hover {
            background: #f97316;
            transform: scale(1.2);
        }

        .news-indicator.active {
            background: #f97316;
            width: 30px;
            border-radius: 6px;
            position: relative;
        }

        .news-indicator.active::after {
            content: "";
            position: absolute;
            inset: 2px;
            background: white;
            border-radius: 4px;
            opacity: 0.3;
        }

        /* Auto-play indicator */
        .news-indicator.active.playing::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 6px;
            background: linear-gradient(90deg, transparent, #f97316);
            animation: indicatorProgress 6s linear infinite;
        }

        @keyframes indicatorProgress {
            0% {
                transform: scaleX(0);
                transform-origin: left;
            }

            100% {
                transform: scaleX(1);
                transform-origin: left;
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .news-card.featured {
                flex-direction: column;
            }

            .news-card.featured .news-image {
                width: 100%;
                height: 60%;
            }

            .news-content {
                width: 100%;
                height: 40%;
                padding: 2rem;
            }

            .news-content h3 {
                font-size: 1.5rem;
            }

            .news-slider {
                height: 600px;
            }
        }

        @media (max-width: 768px) {
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .news-controls {
                width: 100%;
                justify-content: space-between;
            }

            .news-slider {
                height: 500px;
            }

            .news-content {
                padding: 1.5rem;
            }

            .news-content h3 {
                font-size: 1.25rem;
            }

            .news-content p {
                font-size: 0.9rem;
            }

            .news-meta {
                flex-direction: column;
                gap: 0.5rem;
            }

            .slide-content {
                max-width: 10%;
                margin-right: 0;
            }

            .carousel-prev {
                left: 1px;
            }

            .carousel-next {
                right: 1px;
            }

            .carousel {
                height: 750px;
            }

        }

        @media (max-width: 480px) {
            .news-slider {
                height: 450px;
            }

            .news-content {
                padding: 1rem;
            }

            .news-content h3 {
                font-size: 1.1rem;
            }

            .news-indicators {
                padding: 1rem;
                gap: 0.5rem;
            }

            .news-nav-btn {
                width: 40px;
                height: 40px;
                font-size: 0.875rem;
            }
        }

        /* Forum Section */
        .forum-section {
            padding: 40px 10px;
            display: flex;
            align-items: center;
            position: relative;

        }

        .forum-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .forum-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .forum-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 2fr;
            min-height: 500px;
        }

        .forum-icon {
            background: linear-gradient(135deg, #f97316, #f5cc29);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .forum-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            animation: float 6s ease-in-out infinite;
        }

        .forum-icon i {
            font-size: 4rem;
            color: white;
            position: relative;
            z-index: 2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .forum-text {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .forum-text h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
            position: relative;
        }

        .forum-text h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #f97316, #f5cc29);
            border-radius: 2px;
        }

        .forum-description {
            margin-bottom: 40px;
        }

        .forum-description p {
            font-size: 1.2rem;
            color: #5a6c7d;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .forum-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
            color: #6c757d;
        }

        .feature-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background:
        }

        .forum-action {
            margin-top: auto;
        }

        .forum-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #f97316, #f5cc29);
            ;
            color: white;
            text-decoration: none;
            padding: 18px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .forum-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .forum-btn:hover::before {
            left: 100%;
        }

        .forum-btn:hover {
            transform: translateY(-3px);
        }

        .forum-btn i {
            font-size: 1.2rem;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .forum-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .forum-icon {
                padding: 40px;
            }

            .forum-icon i {
                font-size: 3rem;
            }

            .forum-text {
                padding: 40px 30px;
            }

            .forum-text h2 {
                font-size: 2.2rem;
            }

            .forum-description p {
                font-size: 1.1rem;
            }

            .forum-features {
                grid-template-columns: 1fr;
                text-align: left;
            }
        }

        @media (max-width: 480px) {
            .forum-section {
                padding: 40px 15px;
            }

            .forum-text {
                padding: 30px 20px;
            }

            .forum-text h2 {
                font-size: 1.8rem;
            }

            .forum-btn {
                padding: 15px 25px;
                font-size: 1rem;
            }
        }

        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            position: relative;
        }

        .gallery-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23000" opacity="0.02"/><circle cx="75" cy="75" r="1" fill="%23000" opacity="0.02"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 50px;
            gap: 20px;
        }




        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            grid-auto-rows: 250px;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .gallery-item.featured {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom,
                    transparent 0%,
                    transparent 40%,
                    rgba(0, 0, 0, 0.3) 70%,
                    rgba(0, 0, 0, 0.8) 100%);
            display: flex;
            align-items: flex-end;
            padding: 25px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-info {
            color: white;
            width: 100%;
        }

        .gallery-info h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0 0 8px 0;
            line-height: 1.3;
        }

        .view-more {
            font-size: 0.9rem;
            color: #cbd5e1;
            font-weight: 500;
        }

        .stretched-link {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        .empty-gallery {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 400px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #374151;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .empty-state p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .gallery-section {
                padding: 60px 0;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
                margin-bottom: 40px;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .section-title h2 i {
                font-size: 1.5rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 15px;
                grid-auto-rows: 200px;
            }

            .gallery-item.featured {
                grid-column: span 1;
                grid-row: span 1;
            }

            .gallery-overlay {
                opacity: 1;
                background: linear-gradient(to bottom, transparent 0%, transparent 50%, rgba(0, 0, 0, 0.7) 100%);
                padding: 20px;
            }

            .gallery-info h4 {
                font-size: 1rem;
            }

            .view-more {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .gallery-grid {
                grid-auto-rows: 180px;
            }

            .empty-state {
                padding: 40px 20px;
            }

            .empty-state i {
                font-size: 3rem;
            }

            .empty-state h3 {
                font-size: 1.3rem;
            }
        }

        /* Animações suaves */
        @media (prefers-reduced-motion: reduce) {

            .gallery-item,
            .gallery-item img,
            .gallery-overlay,
            .view-all-btn {
                transition: none;
            }

            .gallery-item:hover {
                transform: none;
            }

            .gallery-item:hover img {
                transform: none;
            }
        }


        /* Polls Section */
        .polls-section {
            margin-bottom: 4rem;
        }

        .polls-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .poll-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .poll-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .poll-card.active-poll {
            border-color: #f97316;
            background: linear-gradient(135deg, #fff7ed, #ffffff);
        }

        .poll-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .poll-status {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .poll-votes {
            font-weight: 600;
            color: #f97316;
        }

        .poll-options {
            margin-bottom: 1.5rem;
        }

        .poll-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .poll-option:hover {
            border-color: #f97316;
            background: #fff7ed;
        }

        .poll-option input[type="radio"] {
            margin-right: 0.75rem;
            accent-color: #f97316;
        }

        .option-text {
            flex: 1;
            font-weight: 500;
        }

        .option-percentage {
            font-weight: 600;
            color: #f97316;
            font-size: 0.875rem;
        }

        .poll-submit {
            width: 100%;
            justify-content: center;
        }

        /* Interviews Section */
        .interviews-section {
            margin-bottom: 4rem;
        }

        .interviews-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 1.5rem;
        }

        .interview-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .interview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .interview-card.featured {
            grid-row: span 1;
        }

        .video-thumbnail {
            position: relative;
            cursor: pointer;
        }

        .interview-card.featured .video-thumbnail {
            height: 300px;
        }

        .interview-card:not(.featured) .video-thumbnail {
            height: 200px;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .video-thumbnail:hover .play-overlay {
            opacity: 1;
        }

        .play-overlay i {
            font-size: 3rem;
            color: white;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .video-duration {
            position: absolute;
            bottom: 0.75rem;
            right: 0.75rem;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .interview-content {
            padding: 1.5rem;
        }

        .interview-category {
            display: inline-block;
            background: #f97316;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .interview-category.education {
            background: #8b5cf6;
        }

        .interview-category.economy {
            background: #10b981;
        }

        .interview-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #1f2937;
            line-height: 1.4;
        }

        .interview-card.featured .interview-content h3 {
            font-size: 1.5rem;
        }

        .interviewee {
            color: #f97316;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }

        .description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .interview-stats {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: #9ca3af;
        }

        .views,
        .date {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /*Stream Section */

        .stream-section {
            margin-bottom: 4rem;
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 2rem;
        }

        .aovivo-div {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
            background: linear-gradient(135deg, #f97316, #f5cc29);
            border-radius: 20px;
            color: white;
        }

        .stream-title {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            flex: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stream-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .stream-title h2 i {
            color: #f97316;
            font-size: 1.5rem;
        }

        .stream-title p {
            color: #6b7280;
            font-size: 1rem;
        }

        .stream-title h2 {
            font-size: 1.5rem;
        }

        .live-title {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .live-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .live-title h2 i {
            color: #f97316;
            font-size: 1.5rem;
        }

        .live-title p {
            color: #6b7280;
            font-size: 1rem;
        }

        .live-title h2 {
            font-size: 1.5rem;
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 1024px) {
            .stream-section {
                flex-direction: column;
                gap: 1.5rem;
                align-items: center;
                justify-content: center;
            }

            .stream-title,
            .live-title {
                width: 100%;
                max-width: 600px;
                padding: 1.5rem;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .stream-title iframe,
            .live-title iframe {
                width: 100% !important;
                height: 300px !important;
                display: block;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .stream-section {
                flex-direction: column;
                gap: 1rem;
                align-items: center;
                justify-content: center;
            }

            .stream-title,
            .live-title {
                padding: 1rem;
                max-width: 100%;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .stream-title h2,
            .live-title h2 {
                font-size: 1.25rem;
                text-align: center;
            }

            .stream-title iframe,
            .live-title iframe {
                width: 100% !important;
                height: 220px !important;
                display: block;
                margin: 0 auto;
            }
        }

        @media (max-width: 480px) {
            .stream-section {
                flex-direction: column;
                gap: 0.5rem;
                align-items: center;
                justify-content: center;
            }

            .stream-title,
            .live-title {
                padding: 0.5rem;
                max-width: 100%;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .stream-title h2,
            .live-title h2 {
                font-size: 1rem;
                text-align: center;
            }

            .stream-title iframe,
            .live-title iframe {
                width: 100% !important;
                height: 160px !important;
                display: block;
                margin: 0 auto;
            }
        }


        .botaoyoutubestream {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #FF0000;
            /* Vermelho do YouTube */
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        .botaoyoutubestream:hover {
            background-color: #cc0000;
        }

        .botao-canal {
            margin-top: 15px;
            padding: 12px 24px;
            background-color: #cc0000;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .botao-canal:hover {
            background-color: #a60000;
        }

        .divAoVivo2 {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;

        }

        /* Team Section */
        .team-section {
            margin-bottom: 4rem;
        }

        .team-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .team-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
        }

        .team-text {
            padding: 3rem;
        }

        .team-text h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .team-text h2 i {
            color: #f97316;
        }

        .team-text p {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .team-highlights {
            margin-bottom: 2rem;
        }

        .highlight {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: #374151;
        }

        .highlight i {
            color: #f97316;
            font-size: 1.25rem;
        }

        .team-image {
            position: relative;
            height: 400px;

        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            box-shadow: #1f2937;
        }

        .team-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: linear-gradient(135deg, #f97316, #f5cc29);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(249, 115, 22, 0.3);
        }

        ]

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            padding: 1rem;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 800px;
            max-height: 90vh;
            overflow: hidden;
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #6b7280;
        }

        .modal-body {
            padding: 0;
        }

        .modal-body img {
            width: 100%;
            height: auto;
            max-height: 60vh;
            object-fit: contain;
        }

        .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .mobile-menu-toggle {
            display: block;
            /* Ative isso para mostrar o botão em mobile */
            font-size: 1.5rem;
            color: #4b5563;
            cursor: pointer;
        }

        .mobile-menu {
            display: flex;
            flex-direction: column;
            position: fixed;
            top: -100vh;
            /* Escondido acima da tela */
            left: 0;
            width: 100%;
            height: 100vh;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: top 0.3s ease;
            z-index: 1500;
        }

        .mobile-menu.active {
            top: 0;
            /* Desce para ocupar a tela */
        }


        /* Responsive Design */
        @media (max-width: 1024px) {
            .news-grid {
                grid-template-columns: 1fr 1fr;
            }

            .interviews-grid {
                grid-template-columns: 1fr 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .team-content {
                grid-template-columns: 1fr;
            }

            .forum-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .nav-menu {
                display: none;
            }


            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .section-header.centered {
                align-items: center;
            }

            .section-title h2 {
                font-size: 1.5rem;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .interviews-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(4, 150px);
            }

            .polls-container {
                grid-template-columns: 1fr;
            }

            .forum-container {
                padding: 2rem;
            }

            .team-text {
                padding: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 0.5rem;
            }

            .carousel {
                height: 600px;
            }

            .slide-content {
                display: flex;
                flex-direction: column;
                align-self: center;
                max-width: 75%;
                color: #fff;
                margin-right: 10%;
            }

            .slide-content h3 {
                font-size: 1.2rem;
                margin-bottom: 0.8rem;
            }

            .slide-content p {
                font-size: 0.75rem;
                margin-bottom: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .section-title h2 {
                font-size: 1.25rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 200px);
            }

            .carousel {
                height: 500px;
            }

            .slide-content h3 {
                font-size: 1.5rem;
            }

            .slide-content p {
                font-size: 0.9rem;
            }

            .forum-container {
                padding: 1.5rem;
            }

            .forum-text h2 {
                font-size: 1.75rem;
            }

            .forum-stats {
                flex-direction: column;
                gap: 1rem;
            }

            .team-text {
                padding: 1.5rem;
            }

            .team-text h2 {
                font-size: 1.5rem;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation */
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        .loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus styles */
        button:focus,
        a:focus {
            outline: 2px solid #f97316;
            outline-offset: 2px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .news-card,
        .poll-card,
        .interview-card,
        .gallery-item {
            animation: fadeInUp 0.6s ease-out;
        }

        @media (min-width: 768px) {
            .mobile-menu-toggle {
                display: none;
            }

            .mobile-menu {
                display: none !important;
                /* Força esconder o menu */
            }
        }
    </style>


    <script>
        // DOM Elements (Hero carousel - mantido intacto)
        const carousel = document.getElementById("newsCarousel")
        const slides = carousel.querySelectorAll(".carousel-slide")
        let indicators = carousel.querySelectorAll(".indicator")
        const prevBtn = carousel.querySelector(".carousel-prev")
        const nextBtn = carousel.querySelector(".carousel-next")

        // Carousel functionality (mantido)
        let currentSlide = 0
        let slideInterval
        let slideTimeout

        function showSlide(index) {
            indicators = carousel.querySelectorAll(".indicator")
            index = (index + slides.length) % slides.length

            slides.forEach((slide, i) => {
                slide.classList.toggle("active", i === index)
            })

            indicators.forEach((indicator, i) => {
                indicator.classList.toggle("active", i === index)
            })

            currentSlide = index
        }

        function nextSlide() {
            showSlide(currentSlide + 1)
        }

        function prevSlide() {
            showSlide(currentSlide - 1)
        }

        function startSlideshow() {
            clearInterval(slideInterval)
            slideInterval = setInterval(nextSlide, 5000)
        }

        function stopSlideshow() {
            clearInterval(slideInterval)
        }

        function resetSlideshowTimer() {
            stopSlideshow()
            if (slideTimeout) clearTimeout(slideTimeout)
            slideTimeout = setTimeout(() => {
                startSlideshow()
            }, 5000)
        }

        // Event listeners para botões e indicadores (mantido)
        nextBtn.addEventListener("click", () => {
            nextSlide()
            resetSlideshowTimer()
        })

        prevBtn.addEventListener("click", () => {
            prevSlide()
            resetSlideshowTimer()
        })

        indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", () => {
                showSlide(index)
                resetSlideshowTimer()
            })
        })

        carousel.addEventListener("mouseenter", () => {
            if (window.innerWidth > 768) stopSlideshow()
        })

        carousel.addEventListener("mouseleave", () => {
            if (window.innerWidth > 768) startSlideshow()
        })

        // Inicializa slideshow ao carregar DOM (mantido)
        document.addEventListener("DOMContentLoaded", () => {
            startSlideshow()
            initializeNewFeatures()
        })

        // Novas funcionalidades
        function initializeNewFeatures() {
            initializeNewsSlider()
            initializeGallery()
            initializePolls()
            initializeMobileMenu()
            initializeScrollAnimations()
            initializeInterviews()
        }

        // Gallery Modal
        function initializeGallery() {
            const galleryItems = document.querySelectorAll(".gallery-item")
            const modal = document.getElementById("imageModal")
            const modalImage = document.getElementById("modalImage")
            const modalTitle = document.getElementById("modalTitle")
            const modalClose = document.querySelector(".modal-close")

            galleryItems.forEach((item) => {
                item.addEventListener("click", () => {
                    const img = item.querySelector("img")
                    const title = item.getAttribute("data-title")

                    modalImage.src = img.src
                    modalTitle.textContent = title
                    modal.classList.add("active")
                    document.body.style.overflow = "hidden"
                })
            })

            modalClose.addEventListener("click", closeModal)
            modal.addEventListener("click", (e) => {
                if (e.target === modal) closeModal()
            })

            function closeModal() {
                modal.classList.remove("active")
                document.body.style.overflow = "auto"
            }

            // Escape key to close modal
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape" && modal.classList.contains("active")) {
                    closeModal()
                }
            })
        }

        // Polls functionality
        function initializePolls() {
            const pollForms = document.querySelectorAll(".poll-form")

            pollForms.forEach((form) => {
                form.addEventListener("submit", (e) => {
                    e.preventDefault()

                    const formData = new FormData(form)
                    const selectedOption = formData.get(form.querySelector('input[type="radio"]').name)

                    if (!selectedOption) {
                        alert("Por favor, selecione uma opção antes de votar.")
                        return
                    }

                    // Simulate vote submission
                    const submitBtn = form.querySelector(".poll-submit")
                    const originalText = submitBtn.innerHTML

                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...'
                    submitBtn.disabled = true

                    setTimeout(() => {
                        submitBtn.innerHTML = '<i class="fas fa-check"></i> Voto registrado!'
                        submitBtn.style.background = "#10b981"

                        // Update percentages (simulate)
                        updatePollResults(form)

                        setTimeout(() => {
                            submitBtn.innerHTML = originalText
                            submitBtn.disabled = false
                            submitBtn.style.background = ""
                        }, 2000)
                    }, 1500)
                })
            })
        }

        function updatePollResults(form) {
            const options = form.querySelectorAll(".poll-option")
            const totalVotes = Math.floor(Math.random() * 100) + 50

            options.forEach((option, index) => {
                const percentage = option.querySelector(".option-percentage")
                const newPercentage = Math.floor(Math.random() * 40) + 20
                percentage.textContent = `${newPercentage}%`

                // Add visual feedback
                option.style.background = "#f0fdf4"
                option.style.borderColor = "#10b981"

                setTimeout(() => {
                    option.style.background = ""
                    option.style.borderColor = ""
                }, 3000)
            })

            // Update vote count
            const voteCount = form.closest(".poll-card").querySelector(".poll-votes")
            if (voteCount) {
                const currentVotes = Number.parseInt(voteCount.textContent.replace(/\D/g, ""))
                voteCount.textContent = `${currentVotes + 1} votos`
            }
        }

        // Mobile Menu
        document.addEventListener("DOMContentLoaded", () => {
            const toggle = document.querySelector(".mobile-menu-toggle")
            const menu = document.getElementById("mobileMenu")
            const links = document.querySelectorAll(".mobile-nav-link")

            if (!toggle || !menu) return

            toggle.addEventListener("click", () => {
                const isOpen = menu.classList.toggle("active")
                document.body.style.overflow = isOpen ? "hidden" : "auto"
            })

            links.forEach(link => {
                link.addEventListener("click", () => {
                    menu.classList.remove("active")
                    document.body.style.overflow = "auto"
                })
            })

            document.addEventListener("click", (e) => {
                if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                    menu.classList.remove("active")
                    document.body.style.overflow = "auto"
                }
            })
        })

        const closeMenu = document.getElementById('closeMenu');
        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
        });


        // Scroll Animations
        function initializeScrollAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px",
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = "1"
                        entry.target.style.transform = "translateY(0)"
                    }
                })
            }, observerOptions)

            // Observe elements for animation
            const animatedElements = document.querySelectorAll(".news-card, .poll-card, .interview-card, .gallery-item")
            animatedElements.forEach((el) => {
                el.style.opacity = "0"
                el.style.transform = "translateY(30px)"
                el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
                observer.observe(el)
            })
        }

        // Interview Videos
        function initializeInterviews() {
            const videoThumbnails = document.querySelectorAll(".video-thumbnail")

            videoThumbnails.forEach((thumbnail) => {
                thumbnail.addEventListener("click", () => {
                    // Simulate video play
                    const playOverlay = thumbnail.querySelector(".play-overlay")
                    const icon = playOverlay.querySelector("i")

                    icon.className = "fas fa-spinner fa-spin"

                    setTimeout(() => {
                        alert("Funcionalidade de vídeo será implementada em breve!")
                        icon.className = "fas fa-play"
                    }, 1000)
                })
            })
        }

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault()
                const target = document.querySelector(this.getAttribute("href"))
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    })
                }
            })
        })

        // Forum stats animation
        function animateStats() {
            const stats = document.querySelectorAll(".stat-number")

            stats.forEach((stat) => {
                const finalValue = stat.textContent
                const numericValue = Number.parseFloat(finalValue.replace(/[^\d.]/g, ""))
                const suffix = finalValue.replace(/[\d.]/g, "")

                let currentValue = 0
                const increment = numericValue / 50

                const timer = setInterval(() => {
                    currentValue += increment
                    if (currentValue >= numericValue) {
                        currentValue = numericValue
                        clearInterval(timer)
                    }

                    if (suffix === "k") {
                        stat.textContent = (currentValue / 1000).toFixed(1) + "k"
                    } else {
                        stat.textContent = Math.floor(currentValue) + suffix
                    }
                }, 30)
            })
        }

        // Trigger stats animation when forum section is visible
        const forumSection = document.querySelector(".forum-section")
        if (forumSection) {
            const forumObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateStats()
                            forumObserver.unobserve(entry.target)
                        }
                    })
                }, {
                    threshold: 0.5
                },
            )

            forumObserver.observe(forumSection)
        }

        // Add loading states for buttons
        document.querySelectorAll(".btn").forEach((btn) => {
            if (!btn.classList.contains("poll-submit")) {
                btn.addEventListener("click", function(e) {
                    if (this.getAttribute("href") === "#" || !this.getAttribute("href")) {
                        e.preventDefault()

                        const originalText = this.innerHTML
                        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Carregando...'
                        this.disabled = true

                        setTimeout(() => {
                            this.innerHTML = originalText
                            this.disabled = false
                        }, 2000)
                    }
                })
            }
        })

        // News Slider functionality
        function initializeNewsSlider() {
            const newsTrack = document.getElementById("newsTrack")
            const newsSlides = document.querySelectorAll(".news-slide")
            const prevBtn = document.getElementById("newsPrev")
            const nextBtn = document.getElementById("newsNext")
            const indicators = document.querySelectorAll(".news-indicator")
            const progressBar = document.getElementById("newsProgressBar")

            let currentNewsSlide = 0
            let newsSliderInterval
            let isNewsSliderPlaying = true
            const slideCount = newsSlides.length
            const autoPlayDuration = 6000 // 6 seconds

            function updateNewsSlider() {
                // Update track position
                const translateX = -currentNewsSlide * 100
                newsTrack.style.transform = `translateX(${translateX}%)`

                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle("active", index === currentNewsSlide)
                    indicator.classList.toggle("playing", index === currentNewsSlide && isNewsSliderPlaying)
                })

                // Update progress bar
                const progress = ((currentNewsSlide + 1) / slideCount) * 100
                progressBar.style.width = `${progress}%`

                // Update navigation buttons
                prevBtn.disabled = currentNewsSlide === 0
                nextBtn.disabled = currentNewsSlide === slideCount - 1
            }

            function nextNewsSlide() {
                if (currentNewsSlide < slideCount - 1) {
                    currentNewsSlide++
                } else {
                    currentNewsSlide = 0 // Loop back to first slide
                }
                updateNewsSlider()
            }

            function prevNewsSlide() {
                if (currentNewsSlide > 0) {
                    currentNewsSlide--
                } else {
                    currentNewsSlide = slideCount - 1 // Loop to last slide
                }
                updateNewsSlider()
            }

            function goToNewsSlide(index) {
                currentNewsSlide = index
                updateNewsSlider()
            }

            function startNewsAutoPlay() {
                stopNewsAutoPlay()
                newsSliderInterval = setInterval(() => {
                    nextNewsSlide()
                }, autoPlayDuration)
                isNewsSliderPlaying = true
                updateNewsSlider()
            }

            function stopNewsAutoPlay() {
                if (newsSliderInterval) {
                    clearInterval(newsSliderInterval)
                    newsSliderInterval = null
                }
                isNewsSliderPlaying = false
                indicators.forEach((indicator) => indicator.classList.remove("playing"))
            }

            function resetNewsAutoPlay() {
                if (isNewsSliderPlaying) {
                    startNewsAutoPlay()
                }
            }

            // Event listeners
            nextBtn.addEventListener("click", () => {
                nextNewsSlide()
                resetNewsAutoPlay()
            })

            prevBtn.addEventListener("click", () => {
                prevNewsSlide()
                resetNewsAutoPlay()
            })

            indicators.forEach((indicator, index) => {
                indicator.addEventListener("click", () => {
                    goToNewsSlide(index)
                    resetNewsAutoPlay()
                })
            })

            // Pause on hover (desktop only)
            const newsSliderContainer = document.querySelector(".news-slider-container")
            if (window.innerWidth > 768) {
                newsSliderContainer.addEventListener("mouseenter", stopNewsAutoPlay)
                newsSliderContainer.addEventListener("mouseleave", () => {
                    if (isNewsSliderPlaying) startNewsAutoPlay()
                })
            }

            // Touch/swipe support for mobile
            let startX = 0
            let currentX = 0
            let isDragging = false

            newsSliderContainer.addEventListener("touchstart", (e) => {
                startX = e.touches[0].clientX
                isDragging = true
                stopNewsAutoPlay()
            })

            newsSliderContainer.addEventListener("touchmove", (e) => {
                if (!isDragging) return
                currentX = e.touches[0].clientX
                e.preventDefault()
            })

            newsSliderContainer.addEventListener("touchend", () => {
                if (!isDragging) return
                isDragging = false

                const diffX = startX - currentX
                const threshold = 50

                if (Math.abs(diffX) > threshold) {
                    if (diffX > 0) {
                        nextNewsSlide()
                    } else {
                        prevNewsSlide()
                    }
                }

                resetNewsAutoPlay()
            })

            // Keyboard navigation
            document.addEventListener("keydown", (e) => {
                if (e.target.closest(".news-slider-container")) {
                    switch (e.key) {
                        case "ArrowLeft":
                            e.preventDefault()
                            prevNewsSlide()
                            resetNewsAutoPlay()
                            break
                        case "ArrowRight":
                            e.preventDefault()
                            nextNewsSlide()
                            resetNewsAutoPlay()
                            break
                        case " ":
                            e.preventDefault()
                            if (isNewsSliderPlaying) {
                                stopNewsAutoPlay()
                            } else {
                                startNewsAutoPlay()
                            }
                            break
                    }
                }
            })

            // Initialize
            updateNewsSlider()
            startNewsAutoPlay()

            // Pause autoplay when page is not visible
            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    stopNewsAutoPlay()
                } else if (isNewsSliderPlaying) {
                    startNewsAutoPlay()
                }
            })
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>