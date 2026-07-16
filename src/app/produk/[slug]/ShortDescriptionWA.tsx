"use client";

import { useState } from "react";

interface ShortDescriptionWAProps {
  description: string;
}

export default function ShortDescriptionWA({ description }: ShortDescriptionWAProps) {
  const [isExpanded, setIsExpanded] = useState(false);

  // Buat default text dummy panjang > 35 kata jika deskripsi kosong/pendek untuk preview
  const defaultText = description || "Cetak lanyard polyester custom berkualitas tinggi untuk kebutuhan kantor, event, maupun promosi bisnis Anda. Lanyard terbuat dari bahan serat polyester pilihan yang tebal, kuat, dan nyaman digunakan seharian. Diproduksi menggunakan mesin cetak digital printing terbaru menghasilkan warna yang tajam, awet, anti pudar, dan detail logo yang presisi. Kami menyediakan berbagai pilihan aksesoris pendukung seperti stopper plastik hitam berkualitas tinggi, kait logam nikel kuat anti karat, dan ID card holder bahan kulit imitasi atau plastik mika transparan tebal. Dapatkan harga khusus grosir untuk pemesanan jumlah besar, proses pengerjaan cepat dan bergaransi hanya di Lanyard Tangerang.";

  const words = defaultText.split(/\s+/);
  const isLong = words.length > 35;

  const shortText = words.slice(0, 35).join(" ") + "...";

  return (
    <div className="bg-public-soft/40 border border-public-border/50 rounded-2xl p-4 space-y-2.5">
      <h3 className="text-xs font-extrabold text-gray-400 uppercase tracking-wider select-none">
        Detail Informasi Singkat
      </h3>
      <div className="text-xs text-gray-600 leading-relaxed transition-all duration-300">
        {isExpanded ? defaultText : isLong ? shortText : defaultText}
      </div>
      {isLong && (
        <button
          type="button"
          onClick={() => setIsExpanded(!isExpanded)}
          className="inline-flex text-xs font-extrabold text-public-amber-strong hover:text-public-amber hover:underline transition-colors focus:outline-none"
        >
          {isExpanded ? "Tutup Selengkapnya" : "Baca Selengkapnya"}
        </button>
      )}
    </div>
  );
}
