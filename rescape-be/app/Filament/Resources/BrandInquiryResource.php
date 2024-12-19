<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandInquiryResource\Pages;
use App\Models\BrandInquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrandInquiryResource extends Resource
{
    protected static ?string $model = BrandInquiry::class;

    // protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    protected static ?string $navigationGroup = 'Inquiries';

    protected static ?string $navigationLabel = 'Brand Inquiries';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('brand_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('product_category')
                            ->required()
                            ->options([
                                'fashion' => 'Fashion & Apparel',
                                'beauty' => 'Beauty & Cosmetics',
                                'food' => 'Food & Beverage',
                                'home' => 'Home & Lifestyle',
                                'tech' => 'Tech & Electronics',
                                'art' => 'Art & Design',
                                'other' => 'Other',
                            ]),
                        Forms\Components\TextInput::make('product_category_other')
                            ->maxLength(255)
                            ->visible(fn (callable $get) => $get('product_category') === 'other'),
                        Forms\Components\Select::make('brand_stage')
                            ->required()
                            ->options([
                                'startup' => 'Startup (0-2 years)',
                                'growing' => 'Growing (3-5 years)',
                                'established' => 'Established (5+ years)',
                                'emerging' => 'Emerging/Indie Brand',
                                'corporate' => 'Corporate/Enterprise',
                            ]),
                        Forms\Components\Select::make('activation_purpose')
                            ->required()
                            ->options([
                                'launch' => 'Product Launch',
                                'popup' => 'Pop-Up Retail',
                                'awareness' => 'Brand Awareness',
                                'sales' => 'Direct Sales',
                                'testing' => 'Market Testing',
                                'engagement' => 'Customer Engagement',
                                'feedback' => 'Customer Feedback',
                                'seasonal' => 'Seasonal Campaign',
                                'demo' => 'Product Demo',
                                'sampling' => 'Product Sampling',
                            ]),
                        Forms\Components\Select::make('experience_type')
                            ->required()
                            ->options([
                                'boutique' => 'Intimate Boutique Space',
                                'retail' => 'High-Traffic Retail Location',
                                'workshop' => 'Creative Workshop Area',
                                'hospitality' => 'Hospitality Venue',
                                'community' => 'Community Event Space',
                                'gallery' => 'Art Gallery/Exhibition Space',
                                'mixed' => 'Mixed-Use Environment',
                            ]),
                        Forms\Components\Select::make('showcase_preference')
                            ->required()
                            ->options([
                                'floor' => 'Floorspace',
                                'table' => 'Tablespace',
                                'shelf' => 'Shelfspace',
                                'wall' => 'Wallspace',
                            ]),
                        Forms\Components\CheckboxList::make('target_demographic')
                            ->required()
                            ->options([
                                'genz' => 'Gen Z (13-25)',
                                'millennials' => 'Millennials (26-41)',
                                'genx' => 'Gen X (42-57)',
                                'boomers' => 'Baby Boomers (58-76)',
                                'highend' => 'High-End Consumers',
                                'budget' => 'Budget-Conscious Consumers',
                                'specific' => 'Specific Lifestyle Group',
                            ]),
                        Forms\Components\TextInput::make('target_demographic_specific')
                            ->maxLength(255),
                        Forms\Components\Select::make('location_type')
                            ->required()
                            ->options([
                                'retail' => 'Retail Space',
                                'hotels' => 'Hotels',
                                'fnb' => 'F&B Spaces',
                                'coworking' => 'Coworking Spaces',
                                'wellness' => 'Wellness (Spa/Gym/Pilates)',
                                'college' => 'College/University Area',
                                'resort' => 'Resort/Tourist Location',
                                'none' => 'No Preference',
                            ]),
                        Forms\Components\Select::make('space_size')
                            ->required()
                            ->options([
                                'micro' => 'Micro Space (under 200 sq ft)',
                                'small' => 'Small Space (200-500 sq ft)',
                                'medium' => 'Medium Space (500-1000 sq ft)',
                                'large' => 'Large Space (1000-2000 sq ft)',
                                'flexible' => 'Flexible/Variable Needs',
                            ]),
                        Forms\Components\CheckboxList::make('amenities')
                            ->required()
                            ->options([
                                'kitchen' => 'Kitchen/Food Prep Area',
                                'shelving' => 'Display Shelving',
                                'changing' => 'Changing Rooms',
                                'storage' => 'Storage Space',
                                'tech' => 'Tech/WiFi Capabilities',
                                'av' => 'Audio/Visual Equipment',
                                'lighting' => 'Natural Lighting',
                                'visibility' => 'Street Visibility',
                                'parking' => 'Parking Access',
                            ]),
                        Forms\Components\Select::make('budget')
                            ->required()
                            ->options([
                                'budget1' => '$500-$1,000/month',
                                'budget2' => '$1,000-$2,500/month',
                                'budget3' => '$2,500-$5,000/month',
                                'budget4' => '$5,000-$10,000/month',
                                'budget5' => '$10,000+/month',
                                'flexible' => 'Flexible/Negotiable',
                            ]),
                        Forms\Components\Select::make('timeline')
                            ->required()
                            ->options([
                                'immediate' => 'Immediate (0-30 days)',
                                'short' => '1-3 Months',
                                'medium' => '3-6 Months',
                                'long' => '6-12 Months',
                                'flexible' => 'Flexible Timing',
                            ]),
                        Forms\Components\Select::make('duration')
                            ->required()
                            ->options([
                                'oneday' => 'One-Day Event',
                                'weekend' => 'Weekend Pop-Up',
                                'month1' => '1 Month',
                                'month3' => '3 Months',
                                'month6' => '6 Months',
                                'year1' => '1 Year',
                                'flexible' => 'Flexible Duration',
                            ]),
                        Forms\Components\Textarea::make('special_requirements')
                            ->maxLength(65535),
                    ])->columns(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('contact_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_phone')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_company')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_role')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand_stage')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrandInquiries::route('/'),
            'create' => Pages\CreateBrandInquiry::route('/create'),
            'edit' => Pages\EditBrandInquiry::route('/{record}/edit'),
        ];
    }
}
