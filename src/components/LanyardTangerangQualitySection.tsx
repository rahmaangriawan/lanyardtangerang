import {
  BadgeCheck,
  Globe,
  Package,
  Truck,
  Zap,
  type LucideIcon,
} from "lucide-react";

type BenefitItem = {
  title: string;
  description: string;
  Icon: LucideIcon;
  iconBg: string;
  iconColor: string;
};

const BENEFITS = (region: string): BenefitItem[] => [
  {
    title: "Bebas Ongkir",
    description: `Gratis pengiriman ke seluruh ${region} tanpa minimum transaksi. Pesanan kami antar langsung ke lokasi Anda.`,
    Icon: Truck,
    iconBg: "bg-green-500/20",
    iconColor: "text-green-400",
  },
  {
    title: "Same Day Service",
    description:
      "Pesan sebelum jam 11:00 WIB, lanyard selesai dan dikirim hari itu juga. Cocok untuk kebutuhan event mendadak.",
    Icon: Zap,
    iconBg: "bg-amber-500/20",
    iconColor: "text-amber-400",
  },
  {
    title: "Pengiriman Nasional",
    description:
      "Melayani pengiriman ke seluruh Indonesia via JNE, J&T, SiCepat, dan POS Indonesia dengan tarif terjangkau.",
    Icon: Globe,
    iconBg: "bg-blue-500/20",
    iconColor: "text-blue-400",
  },
  {
    title: "Bulk Order & Korporat",
    description:
      "Pesanan partai besar untuk perusahaan, instansi pemerintah, sekolah, dan komunitas. Konsultasi gratis!",
    Icon: Package,
    iconBg: "bg-purple-500/20",
    iconColor: "text-purple-400",
  },
];

interface QualitySectionProps {
  area?: string;
  region?: string;
}

export default function LanyardTangerangQualitySection({
  area = "Tangerang",
  region = "Tangerang Raya",
}: QualitySectionProps = {}) {
  return (
    <section className="area-info-section relative overflow-hidden">
      {/* Dark fallback background */}
      <div className="absolute inset-0 z-0 bg-slate-950" />

      {/* Overlay gradient */}
      <div className="absolute inset-0 z-1 hidden bg-linear-to-t from-slate-950/90 via-slate-950/70 to-slate-950/90 lg:block" />

      <div className="relative z-10 mx-auto max-w-7xl px-6 py-20 lg:px-10 sm:py-28">
        {/* Section header */}
        <div className="mb-14 text-center">
          <div className="mb-6 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 backdrop-blur-md">
            <BadgeCheck className="h-4 w-4 text-white" aria-hidden="true" />
            <span className="text-sm font-semibold tracking-wide text-white">
              Keunggulan Layanan Kami
            </span>
          </div>
          <h2
            className="font-bold leading-[1.08] text-white"
            style={{ fontSize: "clamp(2rem, 4vw, 2.75rem)" }}
          >
            Kenapa Memilih Lanyard {area}?
          </h2>
          <p className="mx-auto mt-4 max-w-2xl text-base leading-7 text-white/70">
            Kami memberikan layanan terbaik untuk kebutuhan lanyard Anda — dari
            pengiriman gratis hingga penanganan pesanan partai besar.
          </p>
        </div>

        {/* 4 Info cards in grid */}
        <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
          {BENEFITS(region).map(({ title, description, Icon, iconBg, iconColor }) => (
            <div
              key={title}
              className="group rounded-2xl border border-white/12 bg-white/8 p-7 backdrop-blur-md transition-all duration-300 hover:bg-white/[0.14]"
            >
              <div
                className={`mb-5 flex h-12 w-12 items-center justify-center rounded-xl ${iconBg} ${iconColor} transition-transform duration-300 group-hover:scale-110`}
              >
                <Icon className="h-6 w-6" aria-hidden="true" />
              </div>
              <h3 className="mb-2 text-lg font-bold text-white">{title}</h3>
              <p className="text-sm leading-relaxed text-white/60">
                {description}
              </p>
            </div>
          ))}
        </div>
      </div>

      <style>{`
        .area-info-section {
          background-color: #020617;
        }
        @media (min-width: 1024px) {
          .area-info-section {
            background-image: url('/uploads/area-info-bg.webp');
            background-size: cover;
            background-position: center;
          }
        }
      `}</style>
    </section>
  );
}
